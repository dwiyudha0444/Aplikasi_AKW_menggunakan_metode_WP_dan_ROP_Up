<?php

namespace App\Http\Controllers\dashboard\admin;

use App\Helpers\ROPHelper;
use App\Http\Controllers\Controller;
use App\Models\Kategori;
use App\Models\Produk;
use App\Models\Stok;
use Illuminate\Http\Request;

class AdminStokController extends Controller
{
    public function index()
    {
        $totalQty = ROPHelper::getTotalQtyProdukBulanIni();
        $stok = Stok::orderBy('created_at', 'desc')->get();
        return view('dashboard.admin.produk.stok.index', compact('stok','totalQty'));
    }

    public function create()
    {
        // Mengambil data stok, produk, dan kategori berdasarkan urutan terbaru
        $stok = Stok::orderBy('created_at', 'desc')->get();
        $produk = Produk::orderBy('created_at', 'desc')->get();
        $kategori = Kategori::orderBy('created_at', 'desc')->get();

        // Mengirimkan data ke view menggunakan compact
        return view('dashboard.admin.produk.stok.create', compact('stok', 'produk', 'kategori'));
    }

    public function edit($id)
    {
        $stok = Stok::findOrFail($id);
        $produk = Produk::all();
        return view('dashboard.admin.produk.stok.update', compact('stok', 'produk'));
    }
    

    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'id_produk' => 'required|exists:produk,id',
            // 'id_kategori' => 'required|exists:kategori,id',
            'jumlah' => 'required|integer|min:1',
            'warna' => 'required|string|max:50',
            'model_motif' => 'required|string|max:100',
            'ukuran' => 'required|string|max:20',
        ]);

        try {
            // Simpan data ke tabel stok
            Stok::create([
                'id_produk' => $request->id_produk,
                // 'id_kategori' => $request->id_kategori,
                'jumlah' => $request->jumlah,
                'warna' => $request->warna,
                'model_motif' => $request->model_motif,
                'ukuran' => $request->ukuran,
                'jumlah_keluar' => 0,
            ]);

            // Redirect dengan pesan sukses
            return redirect()->route('admin_stok')->with('success', 'Data stok berhasil ditambahkan!');
        } catch (\Exception $e) {
            // Redirect dengan pesan error jika terjadi kesalahan
            return redirect()->back()->with('error', 'Terjadi kesalahan saat menyimpan data stok: ' . $e->getMessage());
        }
    }

    public function update(Request $request, $id)
{
    // Validasi input
    $request->validate([
        'id_produk' => 'required|exists:produk,id',
        // 'id_kategori' => 'required|exists:kategori,id',
        'jumlah' => 'required|integer|min:1',
        'warna' => 'required|string|max:50',
        'model_motif' => 'required|string|max:100',
        'ukuran' => 'required|string|max:20',
    ]);

    try {
        // Cari data stok berdasarkan ID
        $stok = Stok::findOrFail($id);

        // Update data stok
        $stok->update([
            'id_produk' => $request->id_produk,
            // 'id_kategori' => $request->id_kategori,
            'jumlah' => $request->jumlah,
            'warna' => $request->warna,
            'model_motif' => $request->model_motif,
            'ukuran' => $request->ukuran,
        ]);

        // Redirect dengan pesan sukses
        return redirect()->route('admin_stok')->with('success', 'Data stok berhasil diperbarui!');
    } catch (\Exception $e) {
        // Redirect dengan pesan error jika terjadi kesalahan
        return redirect()->back()->with('error', 'Terjadi kesalahan saat memperbarui data stok: ' . $e->getMessage());
    }
}
}
