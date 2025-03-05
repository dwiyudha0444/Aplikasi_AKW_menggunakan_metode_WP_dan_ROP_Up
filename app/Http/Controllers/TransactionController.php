<?php

namespace App\Http\Controllers;

use App\Models\Pemesanan;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function history()
    {
        $transactions = Pemesanan::where('id_user', auth()->id())
            ->orderBy('created_at', 'desc')
            ->paginate(25); // Tambahkan pagination dengan 25 data per halaman
    
        return view('dashboard.reseller.landingpage.history', compact('transactions'));
    }
    
}