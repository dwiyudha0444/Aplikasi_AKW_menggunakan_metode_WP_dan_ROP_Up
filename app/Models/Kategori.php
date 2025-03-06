<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    protected $table = 'kategori';

    // Primary key
    protected $primaryKey = 'id_kategori';

    protected $fillable = [
        'nama',
    ];

    // public function produk()
    // {
    //     return $this->hasMany(Produk::class, 'id_kategori', 'id');
    // }
}
