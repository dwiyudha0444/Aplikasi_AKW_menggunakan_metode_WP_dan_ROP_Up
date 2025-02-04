<?php

namespace App\Http\Controllers;

use App\Models\Pemesanan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;
use Exception;

class PaymentController extends Controller
{
    // app/Http/Controllers/CartController.php
    public function updateTotalPrice(Request $request)
    {
        // Ambil nilai total harga yang dikirimkan dari AJAX
        $total = $request->input('total');

        // Simpan total harga dalam session atau database
        session(['total_price' => $total]);

        // Jika ingin menyimpannya di database, misalnya pada tabel Pemesanan:
        // $order = Pemesanan::find($orderId);
        // $order->total_harga = $total;
        // $order->save();

        // Mengirimkan response sukses
        return response()->json(['status' => 'success', 'total' => $total]);
    }

    public function showPaymentPage($order_id)
    {
        // Mengambil total_price yang disimpan di session
        $totalPrice = session('total_price'); 
    
        // Ambil data order berdasarkan order_id
        $order = Pemesanan::where('order_id', $order_id)
            ->with('pemesananProduk')  // Mengambil relasi pemesananProduk
            ->first();
    
        // Pastikan order ditemukan
        if (!$order) {
            return redirect()->route('cart.index')->with('error', 'Order not found!');
        }
    
        // Ambil total_harga yang sudah ada atau hitung total jika belum ada
        $total = $order->total_harga;
    
        // Return view dengan data order
        return view('dashboard.reseller.landingpage.payment', [
            'order_id' => $order->order_id,
            'total' => $total,
            'totalPrice' => $totalPrice  // Mengirimkan total_price dari session ke view
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
