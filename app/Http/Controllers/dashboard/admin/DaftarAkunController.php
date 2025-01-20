<?php

namespace App\Http\Controllers\dashboard\admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class DaftarAkunController extends Controller
{
    public function index()
    {
        // Ambil data pengguna yang terbaru berdasarkan tanggal pembuatan
        $users = User::orderBy('created_at', 'desc')->get();
    
        // Kirim data ke view
        return view('dashboard.admin.daftar_akun.index', compact('users'));
    }
    
}
