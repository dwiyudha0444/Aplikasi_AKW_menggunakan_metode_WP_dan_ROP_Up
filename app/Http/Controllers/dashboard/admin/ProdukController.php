<?php

namespace App\Http\Controllers\dashboard\admin;

use App\Http\Controllers\Controller;
use App\Models\Kategori;
use App\Models\PemesananProduk;
use App\Models\Produk;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Exception;

class ProdukController extends Controller
{
    public function index()
    {
        $produk = Produk::orderBy('created_at', 'desc')->get();

        return view('dashboard.admin.produk.index', compact('produk'));
    }

    public function create()
    {
        $kategori = Kategori::all();
        return view('dashboard.admin.produk.form', compact('kategori'));
    }

    public function edit($id_produk)
    {
        $produk = Produk::findOrFail($id_produk);
        $kategori = Kategori::all();
        return view('dashboard.admin.produk.edit', compact('produk', 'kategori'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255', 
            'id_kategori' => 'required|exists:kategori,id_kategori', 
            // 'harga' => 'required|numeric|min:0',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048', 
        ]);

        try {
            $produk = new Produk;
            $produk->nama = $request->input('nama');
            $produk->id_kategori = $request->input('id_kategori');
            // $produk->harga = $request->input('harga');

            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $imageName = time() . '.' . $image->getClientOriginalExtension();
                $imagePath = $image->storeAs('public/images', $imageName); 
                $produk->image = 'storage/images/' . $imageName;
            }

            $produk->save();

            return redirect()->route('admin_produk')->with('success', 'Produk berhasil ditambahkan.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Terjadi kesalahan, produk gagal ditambahkan.');
        }
    }

    public function update(Request $request, $id_produk)
    {
        // dd($request->all());
        try {
            if ($request->hasFile('image')) {
                Log::info('File ditemukan:', [
                    'file_name' => $request->file('image')->getClientOriginalName(),
                    'mime_type' => $request->file('image')->getMimeType(),
                    'size' => $request->file('image')->getSize(),
                ]);
            } else {
                Log::warning('Tidak ada file yang diunggah.');
            }

            $validated = $request->validate([
                'nama' => 'required|string|max:255',
                'id_kategori' => 'required|exists:kategori,id_kategori',
                // 'harga' => 'required|numeric',
                'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);

            $produk = Produk::findOrFail($id_produk);

            $produk->update([
                'nama' => $validated['nama'],
                'id_kategori' => $validated['id_kategori'],
                // 'harga' => $validated['harga'],
            ]);

            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $imageName = time() . '.' . $image->getClientOriginalExtension();
                $image->storeAs('public/images', $imageName);
                $produk->update(['image' => 'storage/images/' . $imageName]);
            }

            return redirect()->route('admin_produk')->with('success', 'Produk berhasil diperbarui!');
        } catch (Exception $e) {
            Log::error('Error in Produk Update: ' . $e->getMessage(), [
                'exception' => $e,
                'request' => $request->all(),
            ]);

            return back()->with('error', 'Terjadi kesalahan saat memperbarui produk.');
        }
    }

    public function destroy($id_produk)
    {
        try {
            $produk = Produk::findOrFail($id_produk);
            $produk->delete();

            return redirect()->route('admin_produk')->with('success', 'Produk berhasil dihapus!');
        } catch (Exception $e) {
            return back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }
}
