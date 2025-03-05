<?php

namespace App\Http\Controllers\dashboard\admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{

    public function index()
    {
        $penjualan = DB::table('pemesanan_produk')
        ->selectRaw('DATE(created_at) as tanggal, SUM(qty_produk) as total_qty')
        ->groupBy('tanggal')
        ->orderBy('tanggal', 'asc')
        ->get();

        $totalAdmin = User::where('role', 'admin')->count();
        $totalReseller = User::where('role', 'reseller')->count();
        $totalKurir = User::where('role', 'kurir')->count();
        $totalOwner = User::where('role', 'owner')->count();
    
        return view('dashboard.admin.dashboard.index', compact('penjualan','totalAdmin', 'totalReseller', 'totalKurir', 'totalOwner'));
    }
    

}