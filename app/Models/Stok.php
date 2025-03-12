<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stok extends Model
{
    use HasFactory;

    // Nama tabel di database
    protected $table = 'stok';

    // Primary key
    protected $primaryKey = 'id_stok';

    // Kolom yang dapat diisi (mass assignable)
    protected $fillable = [
        'id_produk',
        'id_kategori',
        'ukuran',
        'warna',
        'konfirmasi_reseller',
        'model_motif',
        'jumlah',
        'harga'
    ];

    /**
     * Relasi ke tabel Produk (jika ada)
     * Asumsikan id_produk adalah foreign key ke tabel produk
     */
    public function produk()
    {
        return $this->belongsTo(Produk::class, 'id_produk');
    }

    public function ukuran()
    {
        return $this->belongsTo(Ukuran::class, 'ukuran');
    }

    /**
     * Relasi ke tabel Kategori (jika ada)
     * Asumsikan id_kategori adalah foreign key ke tabel kategori
     */
    public function kategori()
    {
        return $this->belongsTo(Kategori::class, 'id_kategori');
    }

    /**
     * Scope untuk filter stok berdasarkan kategori
     */
    public function scopeFilterByKategori($query, $id_kategori)
    {
        return $query->where('id_kategori', $id_kategori);
    }

    /**
     * Scope untuk filter stok berdasarkan produk
     */
    public function scopeFilterByProduk($query, $id_produk)
    {
        return $query->where('id_produk', $id_produk);
    }
}
