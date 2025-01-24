<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pemesanan extends Model
{
    use HasFactory;

    protected $table = 'pemesanan';

    protected $fillable = ['id_user', 'tanggal_pemesanan', 'status_pemesanan', 'total_harga', 'image_bukti_tf', 'order_id', 'status_pengiriman'];

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }

    public function pemesananProduk()
    {
        return $this->hasMany(PemesananProduk::class, 'id_pemesanan');
    }
}