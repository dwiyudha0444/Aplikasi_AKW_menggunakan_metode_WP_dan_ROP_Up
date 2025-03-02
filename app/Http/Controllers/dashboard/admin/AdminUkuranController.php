<?php

namespace App\Http\Controllers\dashboard\admin;

use App\Http\Controllers\Controller;
use App\Models\Ukuran;
use Illuminate\Http\Request;

class AdminUkuranController extends Controller
{
    public function index()
    {
        $diskon = Ukuran::all();
        return view('dashboard.admin.produk.ukuran.index', compact('diskon'));
    }
}
