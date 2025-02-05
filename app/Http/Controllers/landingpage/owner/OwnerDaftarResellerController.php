<?php

namespace App\Http\Controllers\landingpage\owner;

use App\Helpers\WPHelper;
use App\Http\Controllers\Controller;
use App\Models\Penilaian;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OwnerDaftarResellerController extends Controller
{
    public function index()
    {
        // Ambil data dari database
        $data = DB::table('penilaian')->get()->toArray(); // Sesuaikan dengan nama tabel Anda
    
        // Ubah data ke array untuk manipulasi
        $data = json_decode(json_encode($data), true);
    
        // Gunakan fungsi dari helper untuk menggabungkan dan menghitung rata-rata
        $ranking = WPHelper::combineUserData($data);
    
        // Gunakan fungsi dari helper untuk mengalikan nilai kolom dengan 5
        // $ranking = WPHelper::multiplyFieldsByFive($ranking);
    
        // Kirim hasil ke view
        return view('dashboard.owner.daftar_reseller.index', compact('ranking'));
    }
    
}
