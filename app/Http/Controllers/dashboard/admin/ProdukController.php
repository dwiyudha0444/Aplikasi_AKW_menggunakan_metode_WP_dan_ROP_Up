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
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Validasi file image
        ]);

        // Proses penyimpanan produk baru
        try {
            // Membuat objek produk baru
            $produk = new Produk;
            $produk->nama = $request->input('nama');
            $produk->id_kategori = $request->input('id_kategori');
            $produk->harga = $request->input('harga');
            $produk->stok = $request->input('stok');

            // Cek jika ada gambar yang diunggah
            if ($request->hasFile('image')) {
                // Ambil file gambar yang diunggah
                $image = $request->file('image');
                // Buat nama file unik
                $imageName = time() . '.' . $image->getClientOriginalExtension();
                // Tentukan lokasi penyimpanan gambar
                $imagePath = $image->storeAs('public/images', $imageName); // Gambar disimpan dalam folder storage/app/public/images
                // Simpan nama file gambar ke database
                $produk->image = 'storage/images/' . $imageName; // Simpan path gambar
            }

            // Simpan produk ke database
            $produk->save();

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
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Validasi untuk gambar
        ]);

        try {
            // Menemukan produk yang ingin diupdate
            $produk = Produk::findOrFail($id);

            // Menyimpan data produk yang lain
            $produk->nama = $request->nama;
            $produk->id_kategori = $request->id_kategori;
            $produk->harga = $request->harga;
            $produk->stok = $request->stok;

            // Jika ada gambar baru yang diunggah
            if ($request->hasFile('image')) {
                // Menghapus gambar lama jika ada
                if ($produk->image) {
                    $oldImagePath = public_path('storage/' . $produk->image);
                    if (file_exists($oldImagePath)) {
                        unlink($oldImagePath); // Menghapus gambar lama
                    }
                }

                // Proses upload gambar baru
                $image = $request->file('image');
                $imageName = time() . '.' . $image->getClientOriginalExtension();
                $image->storeAs('public/images', $imageName);

                // Simpan path gambar baru
                $produk->image = 'storage/images/' . $imageName;
            }

            // Update produk dengan data baru
            $produk->save();

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