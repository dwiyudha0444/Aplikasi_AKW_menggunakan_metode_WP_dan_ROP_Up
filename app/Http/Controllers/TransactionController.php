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
            ->get();

        return view('dashboard.reseller.landingpage.history', compact('transactions'));
    }
}