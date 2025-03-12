<?php

namespace App\Http\Controllers;

use App\Models\Diskon;
use App\Models\Keranjang;
use Illuminate\Http\Request;
use App\Models\Produk;
use Illuminate\Support\Facades\Session;
use App\Models\Pemesanan;
use App\Models\PemesananProduk;
use App\Models\Pengiriman;
use App\Models\Rop;
use App\Models\Stok;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;
use Exception;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{
    public function updateQuantity(Request $request)
    {
        $request->validate([
            'id' => 'required|integer',
            'quantity' => 'required|integer|min:1',
        ]);

        $id = $request->input('id');
        $quantity = $request->input('quantity');

        // Simpan quantity ke session
        session()->put('cart.' . $id, $quantity);

        return response()->json(['message' => 'Quantity updated successfully']);
    }

    public function index()
    {
        // Ambil data keranjang
        $keranjang = Keranjang::all(); // Pastikan menggunakan Eloquent
        $diskon = Diskon::latest()->value('potongan_diskon');

        // Ambil data stok berdasarkan id_produk yang ada di keranjang
        $stok = DB::table('stok')->whereIn('id_produk', $keranjang->pluck('id_produk'))->get();

        return view('dashboard.reseller.landingpage.keranjang', compact('keranjang', 'stok','diskon'));
    }



    public function add(Request $request)
    {
        $request->validate([
            'id_produk' => 'required|exists:produk,id_produk',
            'id_ukuran' => 'nullable|exists:ukuran,id_ukuran',
            'stok' => 'nullable|integer|min:1',
            'harga' => 'nullable|numeric|min:0',
            'warna' => 'nullable|string',
            'model_motif' => 'nullable|string',
        ]);

        try {
            DB::table('keranjang')->insert([
                'id_produk' => $request->id_produk,
                'id_ukuran' => $request->id_ukuran ?? null,
                'stok' => $request->stok ?? 1,
                'harga' => $request->harga ?? 0,
                'warna' => $request->warna ?? null,
                'model_motif' => $request->model_motif ?? null,
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            return response()->json(['message' => 'Produk berhasil ditambahkan ke keranjang!']);
        } catch (\Exception $e) {
            return response()->json([
                'error' => 'Terjadi kesalahan: ' . $e->getMessage(),
                'line' => $e->getLine(),
                'file' => $e->getFile()
            ], 500);
        }
    }




    public function destroy($id)
    {
        $keranjang = Keranjang::find($id);
        if (!$keranjang) {
            return response()->json(['message' => 'Item tidak ditemukan'], 404);
        }

        $keranjang->delete();

        return response()->json(['message' => 'Item berhasil dihapus'], 200);
    }

    public function checkout(Request $request)
    {
        // Debugging sebelum menyimpan
        // dd($request->all());
        

        // Ambil data user
        $user = Auth::user();
        $userInitials = strtoupper(substr($user->name, 0, 2));
        $today = Carbon::now();
        $dateFormatted = $today->format('dmy');

        // Hitung jumlah pesanan untuk hari ini
        $orderCount = Pemesanan::whereDate('tanggal_pemesanan', Carbon::today())->count();
        $orderIncrement = str_pad($orderCount + 1, 3, '0', STR_PAD_LEFT);

        // Buat order ID
        $orderId = $userInitials . '-' . $dateFormatted . $orderIncrement;

        // Simpan data pemesanan
        $order = Pemesanan::create([
            'id_user' => Auth::id(),
            'order_id' => $orderId,
            'tanggal_pemesanan' => Carbon::now(),
            'total_harga' => $request->total_harga_diskon,
        ]);

        // Ambil semua data di keranjang
        $keranjang = Keranjang::all();

        // Simpan data ke tabel pemesanan_produk
        foreach ($keranjang as $index => $item) {
            $pemesananProduk = PemesananProduk::create([
                'id_pemesanan' => $order->id_pemesanan,
                'id_produk' => $item->id_produk,
                'qty_produk' => (int) ($request->qty_produk[$item->id_keranjang] ?? 0),
                'harga' => (float) str_replace(['Rp', '.'], '', $request->harga[$item->id_keranjang] ?? 0), 
                'total_harga' => ((int) ($request->qty_produk[$item->id_keranjang] ?? 0)) * 
                                 ((float) str_replace(['Rp', '.'], '', $request->harga[$item->id_keranjang] ?? 0)),
            ]);
            
            

            Pengiriman::create([
                'id_pemesanan' => $order->id_pemesanan,
                'id_pemesanan_produk' => $pemesananProduk->id_pemesanan_produk,
                'id_users' => Auth::id(),
                'status_pengiriman' => 'BelumDibayar',
            ]);

            Rop::create([
                'id_produk' => $item->id_produk,
                'stok_keluar' => $request->qty_produk[$item->id_keranjang] ?? 0,
                'id_stok' => $request->id_stok[$item->id_keranjang] ?? null,

            ]);
        }

        // Hapus semua data di keranjang setelah checkout
        Keranjang::truncate();

        return redirect()->to('dashboard_reseller/cart/payment/' . $order->order_id);
    }



    public function checkout2(Request $request)
    {
        $request->validate([
            'total_harga' => 'required',
            'qty_produk' => 'required|array', // Pastikan qty_produk berupa array
            'id_stok' => 'required|array', // Pastikan id_stok berupa array
        ]);

        $user = Auth::user();
        $userInitials = strtoupper(substr($user->name, 0, 2));
        $today = Carbon::now();
        $dateFormatted = $today->format('dmy');

        $orderCount = Pemesanan::whereDate('tanggal_pemesanan', Carbon::today())->count();
        $orderIncrement = str_pad($orderCount + 1, 3, '0', STR_PAD_LEFT);

        $orderId = $userInitials . '-' . $dateFormatted . $orderIncrement;

        $order = Pemesanan::create([
            'id_user' => Auth::id(),
            'order_id' => $orderId,
            'tanggal_pemesanan' => Carbon::now(),
            'total_harga' => $request->total_harga,
        ]);

        // Loop setiap produk yang dipesan
        foreach ($request->qty_produk as $index => $qty) {
            $id_produk = $request->id_produk[$index];
            $id_stok = $request->id_stok[$index];
            $harga = $request->harga[$index];
            $total_harga = $qty * $harga;

            $pemesananProduk = PemesananProduk::create([
                'id_pemesanan' => $order->id,
                'id_produk' => $id_produk,
                'qty_produk' => $qty,
                'harga' => $harga,
                'total_harga' => $total_harga,
            ]);

            // Tambahkan data ke tabel pengiriman
            Pengiriman::create([
                'id_pemesanan' => $order->id,
                'id_pemesanan_produk' => $pemesananProduk->id,
                'id_users' => Auth::id(),
                'status_pengiriman' => 'BelumDibayar',
            ]);

            // Catat stok keluar di ROP
            Rop::create([
                'id_produk' => $id_produk,
                'stok_keluar' => $qty,
                'id_stok' => $id_stok,
            ]);

            // Update jumlah stok di tabel stok
            Stok::where('id_produk', $id_produk)->decrement('jumlah', $qty);
        }

        return redirect()->to('dashboard_reseller/cart/payment/' . $order->order_id);
    }



    public function updateQuantity2($orderId, $productId, Request $request)
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

    public function updateCartSession(Request $request)
    {
        // Validasi input
        $validated = $request->validate([
            'productId' => 'required|integer',
            'quantity' => 'required|integer|min:1',
        ]);

        // Ambil cart dari session
        $cart = Session::get('cart', []);

        // Cari produk di cart berdasarkan productId
        $productIndex = array_search($validated['productId'], array_column($cart, 'id'));

        if ($productIndex !== false) {
            // Perbarui quantity di cart
            $cart[$productIndex]['quantity'] = $validated['quantity'];

            // Perbarui harga berdasarkan quantity
            $product = Produk::find($validated['productId']);
            if ($product) {
                $cart[$productIndex]['price'] = $product->price;
            }

            // Hitung ulang total harga setelah quantity diperbarui
            $total = 0;
            foreach ($cart as $item) {
                $total += $item['price'] * $item['quantity'];
            }

            // Simpan kembali cart dan total harga di session
            Session::put('cart', $cart);
            Session::put('total_price', $total); // Menyimpan total harga di session

            return response()->json([
                'success' => true,
                'total_price' => $total
            ]);
        }

        return response()->json(['error' => 'Product not found in cart'], 404);
    }

    public function addToCart(Request $request)
    {
        // Validasi input
        $validated = $request->validate([
            'productId' => 'required|integer',
            'quantity' => 'required|integer|min:1',
        ]);

        // Ambil cart dari session
        $cart = Session::get('cart', []);

        // Cek apakah produk sudah ada di cart
        $productIndex = array_search($validated['productId'], array_column($cart, 'id'));

        if ($productIndex !== false) {
            // Jika produk sudah ada, perbarui quantity
            $cart[$productIndex]['quantity'] += $validated['quantity'];
        } else {
            // Jika produk belum ada, tambahkan produk baru ke cart
            $product = Produk::find($validated['productId']);
            if ($product) {
                $cart[] = [
                    'id' => $product->id,
                    'name' => $product->name,
                    'harga' => $product->harga,
                    'quantity' => $validated['quantity']
                ];
            }
        }

        // Hitung ulang total harga
        $total = 0;
        foreach ($cart as $item) {
            $total += $item['harga'] * $item['quantity'];
        }

        // Simpan cart dan total harga di session
        Session::put('cart', $cart);
        Session::put('total_price', $total);

        return response()->json([
            'success' => true,
            'cart' => $cart,
            'total_price' => $total
        ]);
    }
}
