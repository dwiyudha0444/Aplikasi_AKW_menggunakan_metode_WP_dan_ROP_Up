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
        $pengiriman = Pengiriman::findOrFail($id);

        // Perbarui kolom konfirmasi_pelanggan dengan nilai "Barang Diterima"
        $pengiriman->konfirmasi_reseller = 'Barang Diterima';
        $pengiriman->save();

        // Redirect ke halaman penilaian dengan membawa ID pengiriman
        return redirect()->route('penilaian.index', ['id' => $id])->with('success', 'Barang telah diterima, silakan beri penilaian.');
    }

    public function indexPenilaian()
    {
        // Ambil data produk dari database menggunakan model
        $pengiriman = Pengiriman::all(); // Pastikan model `Product` sesuai dengan nama model Anda
        $atribut = Atribut::all();
        // Kirim data produk ke view
        return view('dashboard.reseller.pengiriman.penilaian', compact('pengiriman'));
    }

    public function storePenilaian(Request $request, $id)
    {
        $validated = $request->validate([
            'kualitas_produk' => 'required|integer|between:1,10',
            'harga_produk' => 'required|integer|between:1,10',
            'layanan_pelanggan' => 'required|integer|between:1,10',
            'ulasan_pelanggan' => 'required|integer|between:1,10',
            'fleksibilitas_pembayaran' => 'required|integer|between:1,3',
        ]);

        $averageRating = ($validated['kualitas_produk'] + $validated['harga_produk'] + $validated['layanan_pelanggan'] + $validated['ulasan_pelanggan'] + $validated['fleksibilitas_pembayaran']) / 5;

        Penilaian::create([
            'id_pemesanan' => $id, 
            'rating' => $averageRating, 
            'komentar' => $request->komentar ?? null, 
        ]);

        return redirect()->route('penilaian.index', $id)
            ->with('success', 'Penilaian berhasil disimpan!');
    }
}