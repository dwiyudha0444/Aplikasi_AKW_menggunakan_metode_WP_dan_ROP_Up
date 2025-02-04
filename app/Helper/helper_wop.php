<?php

use App\Models\Penilaian;

if (!function_exists('getAllPenilaian')) {
    function getAllPenilaian()
    {
        return Penilaian::all();
    }
}
