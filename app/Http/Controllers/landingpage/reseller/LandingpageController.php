<?php

namespace App\Http\Controllers\landingpage\reseller;

use App\Http\Controllers\Controller;
use App\Models\Produk;
use Illuminate\Http\Request;

class LandingpageController extends Controller
{
    public function index()
    {
        // Ambil data produk dari database menggunakan model
        $products = Produk::all(); // Pastikan model `Product` sesuai dengan nama model Anda

        // Kirim data produk ke view
        return view('dashboard.reseller.landingpage.index', compact('products'));
    }

}