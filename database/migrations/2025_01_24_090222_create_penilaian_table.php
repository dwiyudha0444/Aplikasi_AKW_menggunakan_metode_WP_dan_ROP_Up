<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('penilaian', function (Blueprint $table) {
            $table->id(); // Kolom id sebagai primary key
            $table->foreignId('id_pemesanan')->constrained('pemesanan')->onDelete('cascade');
            $table->foreignId('id_pemesanan_produk')->constrained('pemesanan_produk')->onDelete('cascade'); // Relasi dengan tabel pemesanan
            $table->integer('kualitas_produk')->nullable(); // Kolom rating
            $table->integer('harga_produk')->nullable();
            $table->integer('layanan_pelanggan')->nullable();
            $table->integer('ulasan_pelanggan')->nullable();
            $table->integer('fleksibilitas_pembayaran')->nullable();
            $table->timestamps(); // Kolom created_at dan updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('penilaian');
    }
};