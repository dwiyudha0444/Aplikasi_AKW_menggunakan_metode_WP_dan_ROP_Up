<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produk;
use Illuminate\Support\Facades\Session;
use App\Models\Pemesanan;
use App\Models\PemesananProduk;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;
use Exception;

class CartController extends Controller
{
    public function index()
    {
        $cart = Session::get('cart', []);

        foreach ($cart as $key => $value) {
            $product = Produk::find($key);

            if ($product) {
                $cart[$key]['image_url'] = $product->image_url;
            } else {
                $cart[$key]['image_url'] = asset('storage/images/default.jpg');
            }
        }

        Session::put('cart', $cart);

        $total = 0;
        foreach ($cart as $item) {
            $total += $item['price'] * $item['quantity'];
        }
        return view('dashboard.reseller.landingpage.keranjang', compact('cart', 'total'));
    }

    public function add(Request $request)
    {
        $product = Produk::findOrFail($request->product_id);

        $cart = Session::get('cart', []);

        if (isset($cart[$product->id])) {
            $cart[$product->id]['quantity']++;
        } else {
            $cart[$product->id] = [
                'name' => $product->nama,
                'price' => $product->harga,
                'quantity' => 1,
            ];
        }

        // Calculate total price
        $total = 0;
        foreach ($cart as $item) {
            $total += $item['price'] * $item['quantity'];
        }

        Session::put('cart', $cart);

        return redirect()->route('cart.index')->with('success', 'Produk berhasil ditambahkan ke keranjang!')->with('total', $total);
    }

    public function destroy($productId)
    {
        $cart = Session::get('cart', []);
        if (isset($cart[$productId])) {

            unset($cart[$productId]);

            Session::put('cart', $cart);
        }

        $total = 0;
        foreach ($cart as $item) {
            $total += $item['price'] * $item['quantity'];
        }

        return redirect()->route('cart.index')->with('success', 'Produk berhasil dihapus dari keranjang!')->with('total', $total);
    }

    public function checkout()
    {
        try {
            $cart = Session::get('cart', []);

            if (empty($cart)) {
                Log::warning('Checkout attempt with empty cart', [
                    'user_id' => Auth::id(), 
                    'cart_data' => $cart, 
                ]);
                return redirect()->route('cart.index')->with('error', 'Your cart is empty!');
            }

            $total = 0;
            foreach ($cart as $item) {
                $total += $item['price'] * $item['quantity'];
            }

            Log::info('Creating order', [
                'user_id' => Auth::id(),
                'total_price' => $total,
            ]);

            $order = Pemesanan::create([
                'id_user' => Auth::id(),
                'tanggal_pemesanan' => Carbon::now(),
                'status_pemesanan' => 'pending',
                'total_harga' => $total,
            ]);

            Log::info('Order created successfully', [
                'order_id' => $order->id,
                'user_id' => Auth::id(),
                'total_price' => $total,
            ]);

            foreach ($cart as $item) {
                Log::info('Processing cart item', ['item' => $item]);

                if (!isset($item['id'])) {
                    Log::error('Cart item does not have "id" key', ['item' => $item]);
                    continue; 
                }

                PemesananProduk::create([
                    'id_pemesanan' => $order->id,
                    'id_produk' => $item['id'],
                    'qty_produk' => $item['quantity'],
                    'harga' => $item['price'],
                    'total_harga' => $item['price'] * $item['quantity'],
                ]);

                Log::info('Product added to order', [
                    'order_id' => $order->id,
                    'product_id' => $item['id'],
                    'quantity' => $item['quantity'],
                    'price_per_unit' => $item['price'],
                    'total_price' => $item['price'] * $item['quantity'],
                ]);
            }


            Session::forget('cart');

            Log::info('Cart cleared after successful checkout', [
                'user_id' => Auth::id(),
            ]);

            return redirect()->route('dashboard_reseller')->with('success', 'Checkout successful! Your order is now placed.');
        } catch (Exception $e) {
            Log::error('Checkout failed', [
                'error_message' => $e->getMessage(),
                'stack_trace' => $e->getTraceAsString(),
                'user_id' => Auth::id(),
            ]);

            return redirect()->route('cart.index')->with('error', 'An error occurred during checkout.');
        }
    }
}