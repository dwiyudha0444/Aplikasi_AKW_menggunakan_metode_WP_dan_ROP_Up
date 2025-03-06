<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rop extends Model
{
    // Nama tabel di database
    protected $table = 'rop';

    // Primary key
    protected $primaryKey = 'id_rop';

    // Kolom yang dapat diisi (mass assignable)
    protected $fillable = [
        'id_produk',
        'stok_keluar',
        'id_stok',
    ];
}
