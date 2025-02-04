<?php

namespace App\Http\Controllers\landingpage\owner;

use App\Http\Controllers\Controller;
use App\Models\Penilaian;
use Illuminate\Http\Request;

class OwnerPenilaianController extends Controller
{
    public function index()
    {
        $penilaian = Penilaian::all(); 
        return view('dashboard.owner.penilaian.index', compact('penilaian'));
    }
}
