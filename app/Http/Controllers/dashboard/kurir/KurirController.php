<?php

namespace App\Http\Controllers\dashboard\kurir;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class KurirController extends Controller
{
    public function index()
    {
        return view('dashboard.kurir.dashboard.index');
    }
}
