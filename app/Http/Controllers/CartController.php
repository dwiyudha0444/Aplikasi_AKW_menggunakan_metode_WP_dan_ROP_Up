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
    
        if (empty($cart)) {
            return redirect()->route('cart.index')->with('error', 'Your cart is empty!');
        }
    
        $total = 0;
        foreach ($cart as $item) {
            if (!isset($item['id'])) {
                Log::error('Cart item does not have "id" key', ['item' => $item]);
                continue;
            }
            $total += $item['price'] * $item['quantity'];
        }
    
        $user = Auth::user();
        $userInitials = strtoupper(substr($user->name, 0, 2));
        $today = Carbon::now();
        $dateFormatted = $today->format('dmy');
    
        $orderCount = Pemesanan::whereDate('tanggal_pemesanan', Carbon::today())->count();
        $orderIncrement = str_pad($orderCount + 1, 3, '0', STR_PAD_LEFT); // Padding angka ke 3 digit (misalnya: 001, 002, dll.)
    
        $orderId = $userInitials . '-' . $dateFormatted . $orderIncrement;
    
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
                'harga' => $item['price'],
                'total_harga' => $item['price'] * $item['quantity'],
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

    public function updateQuantity(Request $request, $order_id, $product_id)
    {
        // Ambil pesanan berdasarkan order_id
        $order = Pemesanan::where('order_id', $order_id)->first();

        if (!$order) {
            return response()->json(['error' => 'Order not found!'], 404);
        }

        // Cari produk yang sesuai dengan product_id dalam order tersebut
        $product = $order->pemesananProduk()->where('product_id', $product_id)->first();

        if (!$product) {
            return response()->json(['error' => 'Product not found in order!'], 404);
        }

        // Update quantity
        $product->quantity = $request->quantity; // Pastikan request membawa data quantity
        $product->save();

        // Hitung total harga baru
        $total = $order->pemesananProduk->sum(function ($item) {
            return $item->quantity * $item->price;
        });

        // Update total_harga di tabel pemesanan
        $order->total_harga = $total;
        $order->save();

        return response()->json([
            'success' => 'Quantity updated successfully!',
            'total' => $total
        ]);
    }
}