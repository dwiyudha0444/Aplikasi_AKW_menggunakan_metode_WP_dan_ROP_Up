<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Diskon extends Model
{
    use HasFactory;

    protected $table = 'diskon'; // Nama tabel di database
    protected $primaryKey = 'id_produk'; // Primary key tabel
    public $incrementing = false; // Karena id_produk bukan auto-increment
    protected $keyType = 'bigint'; // Tipe data primary key

    protected $fillable = [
        'id_produk',         // ID Produk
        'potongan_diskon',   // Potongan Diskon
    ];

    // Contoh relasi (jika ada)
    public function produk()
    {
        return $this->belongsTo(Produk::class, 'id_produk');
    }
}
