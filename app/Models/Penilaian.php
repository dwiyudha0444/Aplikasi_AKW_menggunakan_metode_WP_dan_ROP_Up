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
        'rating',
        'komentar'
    ];

    // Menentukan relasi dengan model Pemesanan
    public function pemesanan()
    {
        return $this->belongsTo(Pemesanan::class, 'id_pemesanan');
    }
}