<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produk;
use Illuminate\Support\Facades\Session;
use App\Models\Pemesanan;
use App\Models\PemesananProduk;
use App\Models\Pengiriman;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;
use Exception;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{
    public function index()
    {

        $cart = Session::get('cart', []);
        // dd($cart);

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

        $cart[$product->id] = [
            'id' => $product->id,
            'name' => $product->nama,
            'price' => $product->harga,
            'quantity' => 1,
            'image_url' => $product->image_url,
        ];

        Session::put('cart', $cart);

        Log::info('Product added to cart', ['cart' => $cart]);

        return redirect()->route('cart.index')->with('success', 'Product added to cart!');
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
        $cart = Session::get('cart', []);

        // Pastikan cart tidak kosong
        if (empty($cart)) {
            return redirect()->route('cart.index')->with('error', 'Your cart is empty!');
        }

        // Update harga dan qty dalam cart jika ada perubahan
        foreach ($cart as $key => $item) {
            if (isset($item['id'])) {
                // Cari produk berdasarkan ID
                $product = Produk::find($item['id']);

                if ($product) {
                    // Pastikan harga produk tidak null
                    if ($product->harga !== null) { // Ubah price menjadi harga
                        $cart[$key]['harga'] = $product->harga;  // Perbarui harga produk
                    } else {
                        Log::error('Harga produk tidak ditemukan atau null untuk produk ID ' . $item['id']);
                        $cart[$key]['harga'] = 0; // Atau harga default lainnya
                    }
                } else {
                    // Jika produk tidak ditemukan, log error atau berikan harga default
                    Log::error('Produk tidak ditemukan untuk ID ' . $item['id']);
                    $cart[$key]['harga'] = 0; // Atau harga default lainnya
                }

            }
        }

        // Setelah memperbarui cart di sesi, simpan kembali
        Session::put('cart', $cart);

        // Debug untuk memastikan cart telah diperbarui
        dd($cart);

        // Hitung total harga setelah update
        $total = 0;
        foreach ($cart as $item) {
            if (!isset($item['id'])) {
                Log::error('Cart item does not have "id" key', ['item' => $item]);
                continue;
            }
            // Pastikan harga tidak null sebelum dihitung
            if ($item['harga'] !== null) {  // Ganti price menjadi harga
                $total += $item['harga'] * $item['quantity'];  // Ganti price menjadi harga
            } else {
                Log::error('Harga produk null saat menghitung total harga', ['item' => $item]);
            }
        }


        // Debug total harga
        dd($total);

        $user = Auth::user();
        $userInitials = strtoupper(substr($user->name, 0, 2));
        $today = Carbon::now();
        $dateFormatted = $today->format('dmy');

        $orderCount = Pemesanan::whereDate('tanggal_pemesanan', Carbon::today())->count();
        $orderIncrement = str_pad($orderCount + 1, 3, '0', STR_PAD_LEFT); // Padding angka ke 3 digit (misalnya: 001, 002, dll.)

        $orderId = $userInitials . '-' . $dateFormatted . $orderIncrement;

        // Debug order ID
        dd($orderId);

        $order = Pemesanan::create([
            'id_user' => Auth::id(),
            'order_id' => $orderId,
            'tanggal_pemesanan' => Carbon::now(),
            'total_harga' => $total,
        ]);

        foreach ($cart as $item) {
            if (!isset($item['id'])) {
                continue;
            }

            $pemesananProduk = PemesananProduk::create([
                'id_pemesanan' => $order->id,
                'id_produk' => $item['id'],
                'qty_produk' => $item['quantity'],
                'harga' => $item['harga'],  // Ganti price menjadi harga
                'total_harga' => $item['harga'] * $item['quantity'],  // Ganti price menjadi harga
            ]);

            // Menambahkan data ke tabel pengiriman untuk setiap produk yang dipesan
            Pengiriman::create([
                'id_pemesanan' => $order->id,
                'id_pemesanan_produk' => $pemesananProduk->id, // Mendapatkan id dari PemesananProduk
                'id_users' => Auth::id(), // Menggunakan id user yang sedang login
                'status_pengiriman' => 'BelumDibayar', // Status awal pengiriman
            ]);
        }

        Session::forget('cart');

        return redirect()->to('dashboard_reseller/cart/payment/' . $order->order_id);
    }



    public function updateQuantity($orderId, $productId, Request $request)
    {
        $validated = $request->validate([
            'qty_produk' => 'required|integer|min:1',
            'harga' => 'required|numeric',
        ]);

        // Temukan order dan produk terkait
        $order = PemesananProduk::find($orderId);
        $product = $order->products()->find($productId);

        if (!$order || !$product) {
            return response()->json(['error' => 'Order or product not found'], 404);
        }

        // Update qty_produk dan harga di tabel pemesanan_produk
        $order->products()->updateExistingPivot($productId, [
            'qty_produk' => $validated['qty_produk'],
            'harga' => $validated['harga'],
        ]);

        // Update total harga di order
        $total = $order->products()->sum(DB::raw('harga * qty_produk')); // Menghitung total harga

        // Update total harga di tabel order
        $order->total_price = $total;
        $order->save();

        return response()->json([
            'success' => true,
            'total' => $total,
        ]);
    }

    public function updateTotalHarga(Request $request, $order_id)
    {
        // Ambil data order berdasarkan order_id
        $order = Pemesanan::where('order_id', $order_id)->first();

        // Pastikan order ditemukan
        if (!$order) {
            return redirect()->route('cart.index')->with('error', 'Order not found!');
        }

        // Validasi input total
        $request->validate([
            'total' => 'required|numeric|min:0',
        ]);

        // Update total_harga di database
        $order->total_harga = $request->total;
        $order->save();

        // Kembalikan response dalam format JSON atau redirect kembali
        return response()->json([
            'order_id' => $order->order_id,
            'total' => $order->total_harga
        ]);
    }
}