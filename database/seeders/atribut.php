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
                'fleksibilitas_pembayaran' => null, // mengubah yang kosong menjadi null
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'kualitas_produk' => 6,
                'harga_produk' => 6,
                'layanan_pelanggan' => 6,
                'ulasan_pelanggan' => 6,
                'fleksibilitas_pembayaran' => null, // mengubah yang kosong menjadi null
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'kualitas_produk' => 5,
                'harga_produk' => 5,
                'layanan_pelanggan' => 5,
                'ulasan_pelanggan' => 5,
                'fleksibilitas_pembayaran' => null, // mengubah yang kosong menjadi null
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'kualitas_produk' => 7,
                'harga_produk' => 7,
                'layanan_pelanggan' => 7,
                'ulasan_pelanggan' => 7,
                'fleksibilitas_pembayaran' => null, // mengubah yang kosong menjadi null
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'kualitas_produk' => 8,
                'harga_produk' => 8,
                'layanan_pelanggan' => 8,
                'ulasan_pelanggan' => 8,
                'fleksibilitas_pembayaran' => null, // mengubah yang kosong menjadi null
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'kualitas_produk' => 9,
                'harga_produk' => 9,
                'layanan_pelanggan' => 9,
                'ulasan_pelanggan' => 9,
                'fleksibilitas_pembayaran' => null, // mengubah yang kosong menjadi null
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'kualitas_produk' => 10,
                'harga_produk' => 10,
                'layanan_pelanggan' => 10,
                'ulasan_pelanggan' => 10,
                'fleksibilitas_pembayaran' => null, // mengubah yang kosong menjadi null
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
