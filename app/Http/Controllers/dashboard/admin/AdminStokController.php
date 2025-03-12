<?php

namespace App\Http\Controllers\dashboard\admin;

use App\Helpers\ROPHelper;
use App\Http\Controllers\Controller;
use App\Models\Kategori;
use App\Models\Produk;
use App\Models\Stok;
use App\Models\Ukuran;
use Illuminate\Http\Request;

class AdminStokController extends Controller
{
    public function index()
    {
        $stok = Stok::orderBy('created_at', 'desc')->paginate(30); // Menampilkan 30 data per halaman
        $avgStok = ROPHelper::getAverageStokKeluarPerDay();
        $maxStok = ROPHelper::getMaxStokKeluarPerDay();
    
        return view('dashboard.admin.produk.stok.index', compact('stok', 'avgStok', 'maxStok'));
    }
    

    public function create()
    {
        $stok = Stok::orderBy('created_at', 'desc')->get();
        $produk = Produk::orderBy('created_at', 'desc')->get();
        $kategori = Kategori::orderBy('created_at', 'desc')->get();
        $ukuran = Ukuran::all();

        return view('dashboard.admin.produk.stok.create', compact('ukuran', 'stok', 'produk', 'kategori'));
    }

    public function edit($id_stok)
    {
        $stok = Stok::findOrFail($id_stok);
        $produk = Produk::all();
        $ukuranList = Ukuran::all();

        return view('dashboard.admin.produk.stok.update', compact('ukuranList', 'stok', 'produk'));
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'id_produk' => 'required|exists:produk,id_produk',
            'jumlah' => 'required|integer|min:1',
            'warna' => 'required|string|max:50',
            'model_motif' => 'required|string|max:100',
            'ukuran' => 'required|string|max:20',
            'harga' => 'required|integer',
        ]);

        try {
            Stok::create([
                'id_produk' => $request->id_produk,
                'jumlah' => $request->jumlah,
                'warna' => $request->warna,
                'model_motif' => $request->model_motif,
                'ukuran' => $request->ukuran,
                'harga' => $request->harga,
                'jumlah_keluar' => 0,
            ]);

            return redirect()->route('create_admin_stok')->with('success', 'Data stok berhasil ditambahkan!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Terjadi kesalahan saat menyimpan data stok: ' . $e->getMessage());
        }
    }

    public function update(Request $request, $id_stok)
    {
        $request->validate([
            'id_produk' => 'required|exists:produk,id',
            'jumlah' => 'required|integer|min:1',
            'warna' => 'required|string|max:50',
            'model_motif' => 'required|string|max:100',
            'ukuran' => 'required|string|max:20',
        ]);

        try {
            $stok = Stok::findOrFail($id_stok);

            $stok->update([
                'id_produk' => $request->id_produk,
                'jumlah' => $request->jumlah,
                'warna' => $request->warna,
                'model_motif' => $request->model_motif,
                'ukuran' => $request->ukuran,
            ]);

            return redirect()->route('admin_stok')->with('success', 'Data stok berhasil diperbarui!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Terjadi kesalahan saat memperbarui data stok: ' . $e->getMessage());
        }
    }

    public function destroy($id_stok)
    {
        try {
            $stok = Stok::findOrFail($id_stok);
            $stok->delete();

            return redirect()->route('admin_stok')->with('success', 'Data stok berhasil dihapus!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Terjadi kesalahan saat menghapus data stok: ' . $e->getMessage());
        }
    }
}
