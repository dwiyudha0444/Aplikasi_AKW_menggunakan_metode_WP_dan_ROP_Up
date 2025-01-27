<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class atribut extends Seeder
{
    /**
     * Jalankan seeder.
     *
     * @return void
     */
    public function run()
    {
        DB::table('atribut')->insert([
            [
                
                'kualitas_produk' => 1,
                'harga_produk' => 1,
                'layanan_pelanggan' => 1,
                'ulasan_pelanggan' => 1,
                'fleksibilitas_pembayaran' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
               
                'kualitas_produk' => 2,
                'harga_produk' => 2,
                'layanan_pelanggan' => 2,
                'ulasan_pelanggan' => 2,
                'fleksibilitas_pembayaran' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
           
                'kualitas_produk' => 3,
                'harga_produk' => 3,
                'layanan_pelanggan' => 3,
                'ulasan_pelanggan' => 3,
                'fleksibilitas_pembayaran' => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                
                'kualitas_produk' => 4,
                'harga_produk' => 4,
                'layanan_pelanggan' => 4,
                'ulasan_pelanggan' => 4,
                'fleksibilitas_pembayaran' => 4,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
             
                'kualitas_produk' => 5,
                'harga_produk' => 5,
                'layanan_pelanggan' => 5,
                'ulasan_pelanggan' => 5,
                'fleksibilitas_pembayaran' => 5,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}

