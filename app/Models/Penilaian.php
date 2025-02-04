<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penilaian extends Model
{
    use HasFactory;

    protected $table = 'penilaian'; // Nama tabel di database

    // Kolom yang dapat diisi (mass assignable)
    protected $fillable = [
        'id_pemesanan',
        'id_pemesanan_produk',
        'kualitas_produk',
        'harga_produk',
        'layanan_pelanggan',
        'ulasan_pelanggan',
        'fleksibilitas_pembayaran',
        'komentar',
    ];

    // Menentukan relasi dengan model Pemesanan
    public function pemesanan()
    {
        return $this->belongsTo(Pemesanan::class, 'id_pemesanan');
    }

    public function pemesananProduk()
    {
        return $this->belongsTo(PemesananProduk::class, 'id_pemesanan_produk');
    }
}