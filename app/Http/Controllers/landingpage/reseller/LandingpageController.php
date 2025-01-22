<?php

namespace App\Http\Controllers\landingpage\reseller;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LandingpageController extends Controller
{
    public function index()
    {

        // Kirim data ke view
        return view('dashboard.reseller.landingpage.index');
    }
}
