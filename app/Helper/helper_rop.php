<?php

namespace App\Helpers;

use Carbon\Carbon;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

class ROPHelper
{
    public static function getTotalQtyProdukBulanIni()
    {
        return DB::table('pemesanan_produk')
            ->whereMonth('created_at', Carbon::now()->month)
            ->whereYear('created_at', Carbon::now()->year)
            ->sum('qty_produk');
    }
}
