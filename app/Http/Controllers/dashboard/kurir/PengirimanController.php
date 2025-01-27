<?php

namespace App\Http\Controllers\dashboard\kurir;

use App\Http\Controllers\Controller;
use App\Models\PemesananProduk;
use App\Models\Pengiriman;
use Illuminate\Http\Request;

class PengirimanController extends Controller
{
    public function index()
    {
        $pengiriman = Pengiriman::orderBy('created_at', 'desc')->get();

        return view('dashboard.kurir.pengiriman.index', compact('pengiriman'));
    }

    public function edit($id)
    {
        $pengiriman = Pengiriman::findOrFail($id);  // Mengambil satu pemesanan berdasarkan ID
        return view('dashboard.kurir.pengiriman.update', compact('pengiriman'));
    }

    public function update(Request $request, $id)
    {
        // Mencari pengiriman berdasarkan ID
        $pengiriman = Pengiriman::findOrFail($id);

        // Memperbarui status pengiriman sesuai pilihan
        $pengiriman->status_pengiriman = $request->status_pengiriman;
        $pengiriman->save();

        // Redirect kembali dengan pesan sukses
        return redirect()->route('dashboard_kurir_pengiriman')->with('success', 'Status pengiriman berhasil diperbarui.');
    }
}
