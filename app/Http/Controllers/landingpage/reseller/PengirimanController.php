<?php

namespace App\Http\Controllers\landingpage\reseller;

use App\Http\Controllers\Controller;
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

    
}
