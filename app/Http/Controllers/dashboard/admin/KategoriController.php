<?php

namespace App\Http\Controllers\dashboard\admin;

use App\Http\Controllers\Controller;
use App\Models\Kategori;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    public function index()
    {
        // Ambil data kategori yang terbaru berdasarkan tanggal pembuatan
        $kategori = Kategori::orderBy('created_at', 'desc')->get();
    
        // Kirim data ke view
        return view('dashboard.admin.produk.kategori.index', compact('kategori'));
    }

    public function create()
    {
        return view('dashboard.admin.produk.kategori.form');
    }

    public function store(Request $request)
    {
        // Validasi input
        $validatedData = $request->validate([
            'nama' => 'required|string|max:255',
        ]);

        // Menyimpan kategori baru ke database
        Kategori::create([
            'nama' => $validatedData['nama'],
        ]);

        // Redirect ke halaman daftar kategori dengan pesan sukses
        return redirect()->route('admin_kategori')->with('success', 'Kategori berhasil ditambahkan');
    }

    public function edit($id_kategori)
    {
        $kategori = Kategori::findOrFail($id_kategori);
        return view('dashboard.admin.produk.kategori.edit', compact('kategori'));
    }

    public function update(Request $request, $id_kategori)
    {
        // Validasi input
        $validatedData = $request->validate([
            'nama' => 'required|string|max:255',
        ]);

        // Mencari kategori berdasarkan ID dan update
        $kategori = Kategori::findOrFail($id_kategori);
        $kategori->update([
            'nama' => $validatedData['nama'],
        ]);

        // Redirect ke halaman daftar kategori dengan pesan sukses
        return redirect()->route('admin_kategori')->with('success', 'Kategori berhasil diperbarui');
    }

    // Menghapus kategori
    public function destroy($id_kategori)
    {
        $kategori = Kategori::findOrFail($id_kategori);
        $kategori->delete();

        // Redirect ke halaman daftar kategori dengan pesan sukses
        return redirect()->route('admin_kategori')->with('success', 'Kategori berhasil dihapus');
    }
}