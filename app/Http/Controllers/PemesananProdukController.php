<?php

namespace App\Http\Controllers;

use App\Models\PemesananProduk;
use App\Models\Produk;
use App\Models\User;
use Illuminate\Http\Request;

class PemesananProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pemesananProduk = PemesananProduk::with(['pemesanan', 'produk'])->get();

        return view('dashboard.reseller.pemesanan_produk.index', compact('pemesananProduk'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $produk = Produk::all();
        $users = User::all();

        return view('dashboard.reseller.pemesanan_produk.create', compact('produk', 'users'));
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi data yang diterima dari form
        $request->validate([
            'id_produk' => 'required|exists:produk,id', // Memastikan produk ada di tabel produk
            'qty_produk' => 'required|numeric|min:1', // Memastikan jumlah produk valid
            // 'status_pemesanan' => 'required|in:pending,terkonfirmasi,dikirim', // Jika status dibutuhkan
        ]);

        // Mencari data produk berdasarkan id_produk yang dipilih
        $produk = Produk::find($request->id_produk);

        // Menghitung total harga berdasarkan harga produk dan jumlah yang dipesan
        $total_harga = $produk->harga * $request->qty_produk;

        // Membuat data pemesanan baru
        $pemesananProduk = new PemesananProduk();
        $pemesananProduk->id_produk = $request->id_produk;
        $pemesananProduk->qty_produk = $request->qty_produk;
        $pemesananProduk->total_harga = $total_harga;
       
        // Jika status_pemesanan diperlukan, aktifkan kode berikut
        // $pemesananProduk->status_pemesanan = 'pending'; // Atur default status
        $pemesananProduk->save(); // Menyimpan data pemesanan ke database

        // Redirect dengan pesan sukses
        return redirect()->route('pemesanan_produk.index')->with('success', 'Pemesanan produk berhasil!');
    }



    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}