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
    public function index($id)
    {
        // Ambil data produk dari database menggunakan model
        $pengiriman = Pengiriman::all(); // Pastikan model `Product` sesuai dengan nama model Anda

        // Kirim data produk ke view
        return view('dashboard.reseller.pengiriman.index', compact('id','pengiriman'));
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
        return redirect()->route('penilaian.index')->with('success', 'Penilaian berhasil disimpan!');
    }
}