<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengiriman extends Model
{
    use HasFactory;

    protected $table = 'pengiriman';

    protected $fillable = ['id_users','id_pemesanan','id_pemesanan_produk', 'status_pengiriman','konfirmasi_reseller'];

}
