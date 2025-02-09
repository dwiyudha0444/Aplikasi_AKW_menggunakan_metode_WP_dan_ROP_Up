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
        // $kategori = Kategori::all(); // Uncomment jika kategori digunakan
        return view('dashboard.admin.diskon.update', compact('diskon'));
    }
}
