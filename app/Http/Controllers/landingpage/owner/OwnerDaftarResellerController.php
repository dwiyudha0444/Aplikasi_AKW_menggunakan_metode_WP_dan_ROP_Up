<?php

namespace App\Http\Controllers\landingpage\owner;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class OwnerDaftarResellerController extends Controller
{
    public function index()
    {
        $user = User::all(); 
        return view('dashboard.owner.daftar_reseller.index', compact('user'));
    }
}
