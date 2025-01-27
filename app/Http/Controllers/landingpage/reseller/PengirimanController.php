<?php

namespace App\Http\Controllers\landingpage\reseller;

use App\Http\Controllers\Controller;
use App\Models\Atribut;
use App\Models\Pemesanan;
use App\Models\PemesananProduk;
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

    
}
