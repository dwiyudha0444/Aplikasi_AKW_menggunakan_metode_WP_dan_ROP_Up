<?php

namespace App\Http\Controllers\landingpage\reseller;

use App\Http\Controllers\Controller;
use App\Models\Atribut;
use App\Models\Pemesanan;
use App\Models\PemesananProduk;
use App\Models\Penilaian;
use App\Models\Pengiriman;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class PengirimanController extends Controller
{
    public function index($id = null)
    {
        // Ambil data pengiriman berdasarkan ID (jika ada), atau ambil semua data
        $pengiriman = $id ? Pengiriman::where('id', $id)->get() : Pengiriman::all();

        // Kirim data ke view
        return view('dashboard.reseller.pengiriman.index', compact('id', 'pengiriman'));
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

    public function indexPenilaian($id)
    {
        // Ambil data produk dari database menggunakan model
        $pengiriman = Pengiriman::all(); // Pastikan model `Product` sesuai dengan nama model Anda
        $atribut = Atribut::all();
        // Kirim data produk ke view
        return view('dashboard.reseller.pengiriman.penilaian', compact('pengiriman','id'));
    }

    public function storePenilaian(Request $request, $id)
    {
        try {
            // Debug: Tampilkan semua id_pemesanan yang ada
            $listPemesanan = Pemesanan::pluck('id')->toArray();
            Log::info("ID Pemesanan yang tersedia di database: " . implode(', ', $listPemesanan));

            // Cek apakah id_pemesanan ada
            $cekPemesanan = Pemesanan::find($id);
            if (!$cekPemesanan) {
                Log::error("storePenilaian: ID Pemesanan $id tidak ditemukan.");
                return redirect()->back()->with('error', 'ID Pemesanan tidak ditemukan!');
            }

            // Validasi input
            $validated = $request->validate([
                'kualitas_produk' => 'nullable|integer|between:1,10',
                'harga_produk' => 'nullable|integer|between:1,10',
                'layanan_pelanggan' => 'nullable|integer|between:1,10',
                'ulasan_pelanggan' => 'nullable|integer|between:1,10',
                'fleksibilitas_pembayaran' => 'nullable|integer|between:1,3',
                'komentar' => 'nullable|string',
            ]);

            // Simpan data ke tabel penilaian
            $penilaian = Penilaian::create([
                'id_pemesanan' => $id,
                'kualitas_produk' => $validated['kualitas_produk'],
                'harga_produk' => $validated['harga_produk'],
                'layanan_pelanggan' => $validated['layanan_pelanggan'],
                'ulasan_pelanggan' => $validated['ulasan_pelanggan'],
                'fleksibilitas_pembayaran' => $validated['fleksibilitas_pembayaran'],
                'komentar' => $request->komentar ?? null,
            ]);

            Log::info("storePenilaian: Penilaian berhasil disimpan untuk id_pemesanan: $id", $penilaian->toArray());

            return redirect()->route('penilaian.index')->with('success', 'Penilaian berhasil disimpan!');
        } catch (\Exception $e) {
            Log::error("storePenilaian: Error saat menyimpan penilaian untuk id_pemesanan $id: " . $e->getMessage());
            return redirect()->back()->with('error', 'Terjadi kesalahan, coba lagi nanti.');
        }
    }

}