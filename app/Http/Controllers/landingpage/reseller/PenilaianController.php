<?php

namespace App\Http\Controllers\landingpage\reseller;

use App\Http\Controllers\Controller;
use App\Models\Penilaian;
use Illuminate\Http\Request;

class PenilaianController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'id_pemesanan'              => 'required|integer',
            'kualitas_produk'           => 'required|integer|min:1|max:10',
            'harga_produk'              => 'required|integer|min:1|max:10',
            'layanan_pelanggan'         => 'required|integer|min:1|max:10',
            'ulasan_pelanggan'          => 'required|integer|min:1|max:10',
            'fleksibilitas_pembayaran'  => 'required|integer|min:1|max:3',
            'komentar'                  => 'required|string|max:500',
        ]);

        Penilaian::create([
            'id_pemesanan'              => $request->id_pemesanan,
            'kualitas_produk'           => $request->kualitas_produk,
            'harga_produk'              => $request->harga_produk,
            'layanan_pelanggan'         => $request->layanan_pelanggan,
            'ulasan_pelanggan'          => $request->ulasan_pelanggan,
            'fleksibilitas_pembayaran'  => $request->fleksibilitas_pembayaran,
            'komentar'                  => $request->komentar,
        ]);
        
        return redirect()->route('pengiriman_produk')->with('success', 'Barang telah diterima, silakan beri penilaian.');
    }
}
