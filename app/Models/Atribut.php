<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Atribut extends Model
{
    protected $table = 'atribut';
    

    protected $fillable = [
        'kualitas_produk',
        'harga_produk',
        'layanan_pelanggan',
        'ulasan_pelanggan',
        'fleksibilitas_pembayaran',
    ];
}
