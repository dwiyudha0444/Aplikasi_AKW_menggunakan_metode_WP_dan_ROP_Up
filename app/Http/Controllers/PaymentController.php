<?php

namespace App\Http\Controllers;

use App\Models\Pemesanan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;
use Exception;

class PaymentController extends Controller
{
    public function showPaymentPage($order_id)
    {
        $order = Pemesanan::where('order_id', $order_id)->first();

        if (!$order) {
            return redirect()->route('cart.index')->with('error', 'Order not found!');
        }

        return view('dashboard.reseller.landingpage.payment', [
            'order_id' => $order->order_id,
            'total' => $order->total_harga
        ]);
    }

    public function uploadPaymentProof(Request $request)
    {
        try {
            $request->validate([
                'order_id' => 'required|exists:pemesanan,order_id',
                'image_bukti_tf' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            ]);

            $pemesanan = Pemesanan::where('order_id', $request->order_id)->first();

            if (!$pemesanan) {
                Log::warning('Order not found for order_id', ['order_id' => $request->order_id]);
                return redirect()->back()->with('error', 'Order not found!');
            }

            if ($request->hasFile('image_bukti_tf')) {
                $file = $request->file('image_bukti_tf');

                Log::info('Payment proof file found:', [
                    'file_name' => $file->getClientOriginalName(),
                    'mime_type' => $file->getMimeType(),
                    'size' => $file->getSize(),
                ]);

                $filename = time() . '_' . $file->getClientOriginalName();
                $filePath = $file->storeAs('bukti_transfer', $filename, 'public');

                Log::info('Payment proof file uploaded successfully', [
                    'file_path' => $filePath,
                    'order_id' => $request->order_id,
                ]);

                $pemesanan->update([
                    'image_bukti_tf' => $filePath,
                    'status_pemesanan' => 'waiting approvement',
                ]);

                Log::info('Pemesanan status updated to waiting approvement', ['order_id' => $request->order_id]);

                return redirect()->route('history')->with('success', 'Payment proof uploaded successfully!');
            } else {
                Log::warning('No payment proof file uploaded', ['order_id' => $request->order_id]);
            }

            return redirect()->back()->with('error', 'Failed to upload payment proof!');
        } catch (Exception $e) {
            Log::error('Error in uploadPaymentProof', [
                'exception_message' => $e->getMessage(),
                'order_id' => $request->order_id,
                'request' => $request->all(),
            ]);

            return redirect()->back()->with('error', 'Failed to upload payment proof!');
        }
    }
}