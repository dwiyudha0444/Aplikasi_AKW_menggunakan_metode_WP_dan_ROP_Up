<?php

namespace App\Http\Controllers\dashboard\kurir;

use App\Http\Controllers\Controller;
use App\Models\PemesananProduk;
use Illuminate\Http\Request;

class PengirimanController extends Controller
{
    public function index()
    {
        $pengiriman = PemesananProduk::orderBy('created_at', 'desc')->get();

        return view('dashboard.kurir.pengiriman.index', compact('pengiriman'));
    }
}
