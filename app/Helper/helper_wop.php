<?php

namespace App\Helpers;

use Illuminate\Support\Collection;

class WPHelper
{
    public static function combineUserData($data)
    {
        $result = [];
        $userCount = []; // Untuk menghitung jumlah kemunculan setiap id_user

        foreach ($data as $row) {
            $id_user = $row['id_user'];

            if (!isset($result[$id_user])) {
                // Jika id_user belum ada di result, tambahkan
                $result[$id_user] = $row;
                $userCount[$id_user] = 1; // Inisialisasi jumlah kemunculan
            } else {
                // Jika id_user sudah ada, gabungkan datanya
                $result[$id_user]['kualitas_produk'] += $row['kualitas_produk'];
                $result[$id_user]['harga_produk'] += $row['harga_produk'];
                $result[$id_user]['layanan_pelanggan'] += $row['layanan_pelanggan'];
                $result[$id_user]['ulasan_pelanggan'] += $row['ulasan_pelanggan'];
                $result[$id_user]['fleksibilitas_pembayaran'] += $row['fleksibilitas_pembayaran'];
                $userCount[$id_user]++; // Tambahkan jumlah kemunculan
            }
        }

        // Hitung rata-rata untuk setiap id_user
        foreach ($result as $id_user => &$values) {
            $values['kualitas_produk'] /= $userCount[$id_user];
            $values['harga_produk'] /= $userCount[$id_user];
            $values['layanan_pelanggan'] /= $userCount[$id_user];
            $values['ulasan_pelanggan'] /= $userCount[$id_user];
            $values['fleksibilitas_pembayaran'] /= $userCount[$id_user];
        }

        // Reset keys untuk hasil akhir
        return array_values($result);
    }
}
