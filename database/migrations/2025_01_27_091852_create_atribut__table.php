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
        Schema::create('atribut', function (Blueprint $table) {
            $table->id();
            $table->integer('kualitas_produk')->nullable(); 
            $table->integer('harga_produk')->nullable();
            $table->integer('layanan_pelanggan')->nullable();
            $table->integer('ulasan_pelanggan')->nullable();
            $table->integer('fleksibilitas_pembayaran')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('atribut');
    }
};
