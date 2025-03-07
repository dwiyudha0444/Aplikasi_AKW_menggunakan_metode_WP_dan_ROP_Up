<?php

namespace App\Http\Controllers\dashboard\kurir;

use App\Http\Controllers\Controller;
use App\Models\Pengiriman;
use Illuminate\Http\Request;

class KurirController extends Controller
{

    public function index()
    {
        $totalBelumDibayar = Pengiriman::where('status_pengiriman', 'BelumDibayar')->count();
        $totalDikemas = Pengiriman::where('status_pengiriman', 'Dikemas')->count();
        $totalDikirim = Pengiriman::where('status_pengiriman', 'Dikirim')->count();
        $totalSelesai = Pengiriman::where('status_pengiriman', 'Selesai')->count();

        return view('dashboard.kurir.dashboard.index', compact(
            'totalBelumDibayar', 
            'totalDikemas', 
            'totalDikirim', 
            'totalSelesai'
        ));
    }

}
