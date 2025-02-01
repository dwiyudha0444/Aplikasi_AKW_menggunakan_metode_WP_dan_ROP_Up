<?php

namespace App\Http\Controllers\landingpage\reseller;

use App\Http\Controllers\Controller;
use App\Models\Atribut;
use App\Models\Pemesanan;
use App\Models\PemesananProduk;
use App\Models\Penilaian;
use App\Models\Pengiriman;
use Illuminate\Http\Request;

class PengirimanController extends Controller
{
    public function index()
    {
        // Ambil data produk dari database menggunakan model
        $pengiriman = Pengiriman::all(); // Pastikan model `Product` sesuai dengan nama model Anda

        // Kirim data produk ke view
        return view('dashboard.reseller.pengiriman.index', compact('pengiriman'));
    }

    public function diterima(Request $request, $id)
{
    // Cari data pengiriman berdasarkan ID
    $pengiriman = Pengiriman::find($id);

    // Jika data tidak ditemukan, kembalikan dengan error
    if (!$pengiriman) {
        return redirect()->back()->with('error', 'Data pengiriman tidak ditemukan.');
    }

    // Perbarui kolom konfirmasi_reseller dengan nilai "Barang Diterima"
    $pengiriman->update(['konfirmasi_reseller' => 'Barang Diterima']);

    // Pastikan ID pemesanan tersedia untuk redirect ke halaman penilaian
    $id_pemesanan = $pengiriman->id_pemesanan ?? null;

    // Redirect ke halaman penilaian dengan membawa ID pengiriman dan ID pemesanan
    return redirect()->route('penilaian.index', [
        'id' => $id, 
        'id_pemesanan' => $id_pemesanan
    ])->with('success', 'Barang telah diterima, silakan beri penilaian.');
}


    public function indexPenilaian($id ,$id_pemesanan)
    {
        // Ambil data produk dari database menggunakan model
        $pengiriman = Pengiriman::all(); // Pastikan model `Product` sesuai dengan nama model Anda
        $atribut = Atribut::all();
        $pemesananProduk = PemesananProduk::all();
        // Kirim data produk ke view
        return view('dashboard.reseller.pengiriman.penilaian', compact('pengiriman','id','id_pemesanan'));
    }


    public function storePenilaian(Request $request, $id)
    {
        // Validasi input
        $validated = $request->validate([
            'kualitas_produk' => 'nullable|integer|between:1,10',
            'harga_produk' => 'nullable|integer|between:1,10',
            'layanan_pelanggan' => 'nullable|integer|between:1,10',
            'ulasan_pelanggan' => 'nullable|integer|between:1,10',
            'fleksibilitas_pembayaran' => 'nullable|integer|between:1,3',
            'komentar' => 'nullable|string',
        ]);

        // Menyimpan data penilaian ke database
        Penilaian::create([
            'id_pemesanan' => $id, // Menggunakan $id dari parameter
            'kualitas_produk' => $validated['kualitas_produk'],
            'harga_produk' => $validated['harga_produk'],
            'layanan_pelanggan' => $validated['layanan_pelanggan'],
            'ulasan_pelanggan' => $validated['ulasan_pelanggan'],
            'fleksibilitas_pembayaran' => $validated['fleksibilitas_pembayaran'],
            'komentar' => $request->komentar ?? null,
        ]);

        // Redirect ke halaman penilaian dengan pesan sukses
        return redirect()->route('penilaian.index', ['id' => $id])->with('success', 'Barang telah diterima, silakan beri penilaian.');
    }
}