<?php

namespace App\Http\Controllers\dashboard\admin;

use App\Http\Controllers\Controller;
use App\Models\Kategori;
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
        $kategori = Kategori::all();
        return view('dashboard.admin.produk.form', compact('kategori'));
    }

    public function edit($id)
    {
        $produk = Produk::findOrFail($id);
        $kategori = Kategori::all();
        return view('dashboard.admin.produk.edit', compact('produk', 'kategori'));
    }

    public function store(Request $request)
    {
        // Validasi data yang diterima
        $request->validate([
            'nama' => 'required|string|max:255', // Nama produk harus diisi dan maksimal 255 karakter
            'id_kategori' => 'required|exists:kategori,id', // Pastikan kategori yang dipilih ada di tabel kategoris
            'harga' => 'required|numeric|min:0', // Harga harus angka dan lebih dari 0
            'stok' => 'required|numeric|min:0', // Stok harus angka dan lebih dari 0
        ]);

        // Proses penyimpanan produk baru
        try {
            $produk = new Produk;
            $produk->nama = $request->input('nama');
            $produk->id_kategori = $request->input('id_kategori');
            $produk->harga = $request->input('harga');
            $produk->stok = $request->input('stok');
            $produk->save(); // Simpan produk ke database

            // Redirect dengan pesan sukses
            return redirect()->route('admin_produk')->with('success', 'Produk berhasil ditambahkan.');
        } catch (\Exception $e) {
            // Redirect dengan pesan error jika terjadi kesalahan
            return redirect()->back()->with('error', 'Terjadi kesalahan, produk gagal ditambahkan.');
        }
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'id_kategori' => 'required|exists:kategori,id',
            'harga' => 'required|numeric',
            'stok' => 'required|numeric|min:1',
        ]);

        try {
            // Menemukan produk yang ingin diupdate
            $produk = Produk::findOrFail($id);

            // Update data produk
            $produk->update([
                'nama' => $request->nama,
                'id_kategori' => $request->id_kategori,
                'harga' => $request->harga,
                'stok' => $request->stok,
            ]);

            return redirect()->route('admin_produk')->with('success', 'Produk berhasil diperbarui!');
        } catch (\Exception $e) {
            return back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }

    // Menghapus produk
    public function destroy($id)
    {
        try {
            $produk = Produk::findOrFail($id);
            $produk->delete();

            return redirect()->route('admin_produk')->with('success', 'Produk berhasil dihapus!');
        } catch (\Exception $e) {
            return back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }
}
