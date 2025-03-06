<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    protected $table = 'produk';

    protected $primaryKey = 'id_produk';

    protected $fillable = [
        'nama',
        'id_kategori',
        'harga',
        'stok',
        'image'
    ];

    public function kategori()
    {
        return $this->belongsTo(Kategori::class, 'id_kategori', 'id_kategori');
    }

    public function pemesananProduk()
    {
        return $this->hasMany(PemesananProduk::class, 'id_produk');
    }

    public function getImageUrlAttribute()
    {
        // Pastikan file gambar ada dan kembalikan URL yang benar
        if ($this->image) {
            return asset($this->image);
        }

        // Jika gambar tidak ada, kembalikan URL default atau placeholder
        return asset('storage/images/default.jpg'); // Ganti dengan URL gambar default jika diperlukan
    }
}