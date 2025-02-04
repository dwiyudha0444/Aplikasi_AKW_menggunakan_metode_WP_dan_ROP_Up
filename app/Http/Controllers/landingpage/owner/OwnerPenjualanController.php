<?php

namespace App\Http\Controllers\landingpage\owner;

use App\Http\Controllers\Controller;
use App\Models\Pemesanan;
use Illuminate\Http\Request;

class OwnerPenjualanController extends Controller
{
    public function index()
    {
        $pemesanan = Pemesanan::all(); 
        return view('dashboard.owner.penjualan.index', compact('pemesanan'));
    }
}
