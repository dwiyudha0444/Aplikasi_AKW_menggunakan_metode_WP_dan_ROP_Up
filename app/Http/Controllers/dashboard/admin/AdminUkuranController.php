<?php

namespace App\Http\Controllers\dashboard\admin;

use App\Http\Controllers\Controller;
use App\Models\Ukuran;
use Illuminate\Http\Request;

class AdminUkuranController extends Controller
{
    public function index()
    {
        $ukuran = Ukuran::all();
        return view('dashboard.admin.produk.ukuran.index', compact('ukuran'));
    }

    // Menampilkan form tambah ukuran
    public function create()
    {
        return view('dashboard.admin.produk.ukuran.create');
    }

    // Menyimpan data ukuran baru
    public function store(Request $request)
    {
        $request->validate([
            'ukuran' => 'required|string|max:255',
        ]);

        Ukuran::create([
            'ukuran' => $request->ukuran,
            'created_at' => now() 
        ]);
        

        return redirect()->route('admin_ukuran')->with('success', 'Ukuran berhasil ditambahkan!');
    }

    // Menampilkan form edit ukuran
    public function edit($id_ukuran)
    {
        $ukuran = Ukuran::findOrFail($id_ukuran);
        return view('dashboard.admin.ukuran.edit', compact('ukuran'));
    }
    
    

    // Memperbarui data ukuran
    public function update(Request $request, $id)
    {
        $request->validate([
            'ukuran' => 'required|string|max:255',
        ]);

        $ukuran = Ukuran::findOrFail($id);
        $ukuran->update([
            'ukuran' => $request->ukuran,
        ]);

        return redirect()->route('admin_ukuran')->with('success', 'Ukuran berhasil diperbarui!');
    }

    // Menghapus data ukuran
    public function destroy($id)
    {
        $ukuran = Ukuran::findOrFail($id);
        $ukuran->delete();

        return redirect()->route('admin_ukuran')->with('success', 'Ukuran berhasil dihapus!');
    }
}
