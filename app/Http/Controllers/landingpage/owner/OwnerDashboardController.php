<?php

namespace App\Http\Controllers\landingpage\owner;

use App\Http\Controllers\Controller;
use App\Models\Produk;
use Illuminate\Http\Request;

class OwnerDashboardController extends Controller
{
    public function index()
    {
        $products = Produk::all(); 

       
        return view('dashboard.owner.dashboard.index', compact('products'));
    }
}
