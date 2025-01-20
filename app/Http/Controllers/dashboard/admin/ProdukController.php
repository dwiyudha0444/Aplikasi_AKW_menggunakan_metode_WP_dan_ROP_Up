<?php

namespace App\Http\Controllers\dashboard\admin;

use App\Http\Controllers\Controller;
use App\Models\Produk;
use Illuminate\Http\Request;

class ProdukController extends Controller
{
    public function index()
    {
        // Ambil data pengguna yang terbaru berdasarkan tanggal pembuatan
        $produk = Produk::orderBy('created_at', 'desc')->get();
    
        // Kirim data ke view
        return view('dashboard.admin.produk.index', compact('produk'));
    }

    public function create()
    {
        return view('dashboard.admin.produk.form');
    }
}
