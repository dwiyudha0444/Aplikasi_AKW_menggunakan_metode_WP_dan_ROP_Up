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

    foreach ($products as $product) {
        // Harga minimum dan maksimum
        $product->harga_min = Stok::where('id_produk', $product->id_produk)->min('harga') ?? 0;
        $product->harga_max = Stok::where('id_produk', $product->id_produk)->max('harga') ?? 0;

        // Total jumlah stok untuk id_produk terkait
        $product->total_jumlah = Stok::where('id_produk', $product->id_produk)->sum('jumlah') ?? 0;
    }

    return view('dashboard.reseller.landingpage.index', compact('products'));
}

    
}