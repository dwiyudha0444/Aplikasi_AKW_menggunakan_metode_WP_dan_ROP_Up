<?php

namespace App\Helpers;

use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class ROPHelper
{
    public static function getAverageStokKeluarPerDay()
    {
        return DB::table('rop')
            ->select('id_stok', DB::raw('AVG(stok_keluar) as avg_stok_keluar'))
            ->whereMonth('created_at', Carbon::now()->month)
            ->whereYear('created_at', Carbon::now()->year)
            ->groupBy('id_stok', DB::raw('DATE(created_at)')) // Grup berdasarkan id_stok dan tanggal
            ->get();
    }

    public static function getMaxStokKeluarPerDay()
    {
        return DB::table('rop')
            ->select('id_stok', DB::raw('MAX(stok_keluar) as max_stok_keluar'))
            ->whereMonth('created_at', Carbon::now()->month)
            ->whereYear('created_at', Carbon::now()->year)
            ->groupBy('id_stok', DB::raw('DATE(created_at)')) // Grup berdasarkan id_stok dan tanggal
            ->get();
    }
}
