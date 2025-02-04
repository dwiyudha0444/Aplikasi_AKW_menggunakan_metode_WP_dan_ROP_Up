<?php

namespace App\Http\Controllers\landingpage\owner;

use App\Helpers\WPHelper;
use App\Http\Controllers\Controller;
use App\Models\Penilaian;
use App\Models\User;
use Illuminate\Http\Request;

class OwnerDaftarResellerController extends Controller
{
    public function index()
    {
        $penilaian = Penilaian::all()->toArray();
    
        $weights = [
            'kualitas_produk' => 0.3,
            'harga_produk' => 0.2,
            'layanan_pelanggan' => 0.2,
            'ulasan_pelanggan' => 0.2,
            'fleksibilitas_pembayaran' => 0.1,
        ];

        $ranking = WPHelper::calculateWP($penilaian, $weights);
        return view('dashboard.owner.daftar_reseller.index', compact('ranking'));
    }
}
