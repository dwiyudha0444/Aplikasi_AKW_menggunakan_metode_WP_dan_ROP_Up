<?php

namespace App\Http\Controllers\landingpage\reseller;

use App\Http\Controllers\Controller;
use App\Models\Penilaian;
use Illuminate\Http\Request;

class PenilaianController extends Controller
{
    public function store(Request $request, $id)
    {
        $request->validate([
            'id_pemesanan' => 'required|exists:pemesanan,id',
            'id_pemesanan_produk' => 'required|exists:pemesanan_produk,id',
            'kualitas_produk' => 'required|integer|min:1|max:10',
            'harga_produk' => 'required|integer|min:1|max:10',
            'layanan_pelanggan' => 'required|integer|min:1|max:10',
            'ulasan_pelanggan' => 'required|integer|min:1|max:10',
            'fleksibilitas_pembayaran' => 'required|integer|min:1|max:3',
            'komentar' => 'required|string|max:500',
        ]);
    
        // Simpan data ke database
        Penilaian::create([
            'id_user' => auth()->id(),
            'id_pemesanan' => $request->id_pemesanan,
            'id_pemesanan_produk' => $request->id_pemesanan_produk,
            'kualitas_produk' => $request->kualitas_produk,
            'harga_produk' => $request->harga_produk,
            'layanan_pelanggan' => $request->layanan_pelanggan,
            'ulasan_pelanggan' => $request->ulasan_pelanggan,
            'fleksibilitas_pembayaran' => $request->fleksibilitas_pembayaran,
            'komentar' => $request->komentar,
        ]);
    
        return redirect()->route('pengiriman_produk')->with('success', 'Barang telah diterima, silakan beri penilaian.');
    }
}    
