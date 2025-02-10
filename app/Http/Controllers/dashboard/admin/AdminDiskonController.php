<?php

namespace App\Http\Controllers\dashboard\admin;

use App\Http\Controllers\Controller;
use App\Models\Diskon;
use Illuminate\Http\Request;

class AdminDiskonController extends Controller
{
    public function index()
    {
        $diskon = Diskon::all();
        return view('dashboard.admin.diskon.index', compact('diskon'));
    }

    public function create()
    {
        // Mengambil data diskon, produk, dan kategori berdasarkan urutan terbaru
        $diskon = Diskon::orderBy('created_at', 'desc')->get();

        // Mengirimkan data ke view menggunakan compact
        return view('dashboard.admin.diskon.create', compact('diskon'));
    }

    public function edit($id)
    {
        $diskon = Diskon::findOrFail($id);
        return view('dashboard.admin.diskon.update', compact('diskon'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'potongan_diskon' => 'required|integer|min:0|max:100',
        ]);

        try {
            $produk = new Diskon();
            $produk->potongan_diskon = $request->potongan_diskon;
            $produk->save();

            return redirect()->route('admin_diskon')->with('success', 'Diskon berhasil ditambahkan.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'potongan_diskon' => 'required|integer|min:0|max:100',
        ]);

        try {
            $produk = Diskon::findOrFail($id);
            $produk->potongan_diskon = $request->potongan_diskon;
            $produk->save();

            return redirect()->route('admin_diskon')->with('success', 'Diskon berhasil diperbarui.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }
}
