<?php

namespace App\Http\Controllers\landingpage\reseller;

use App\Http\Controllers\Controller;
use App\Models\Produk;
use App\Models\Stok;
use Illuminate\Http\Request;

class LandingpageController extends Controller
{
    public function index()
    {
        // Ambil semua produk
        $products = Produk::all();
    
        // Tambahkan informasi harga minimum dan maksimum dari stok
        foreach ($products as $product) {
            $hargaMin = Stok::where('id_produk', $product->id_produk)->min('harga');
            $hargaMax = Stok::where('id_produk', $product->id_produk)->max('harga');
    
            // Simpan dalam properti tambahan agar bisa digunakan di view
            $product->harga_min = $hargaMin ?? 0;
            $product->harga_max = $hargaMax ?? 0;
        }
    
        // Kirim data ke view
        return view('dashboard.reseller.landingpage.index', compact('products'));
    }
    
}