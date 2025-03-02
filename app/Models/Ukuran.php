<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ukuran extends Model
{
    use HasFactory;

    // Nama tabel di database
    protected $table = 'stok';

    // Primary key
    protected $primaryKey = 'id';

    // Kolom yang dapat diisi (mass assignable)
    protected $fillable = [
        'id_ukuran',
        'ukuran',
    ];
}
