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
        Schema::create('pengiriman', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_users')->constrained('users')->onDelete('cascade');
            $table->foreignId('id_pemesanan')->constrained('pemesanan')->onDelete('cascade'); // Relasi dengan tabel pemesanan
            $table->foreignId('id_pemesanan_produk')->constrained('pemesanan_produk')->onDelete('cascade'); // Relasi dengan tabel pemesanan
            $table->enum('status_pengiriman', ['BelumDibayar', 'Dikemas', 'Dikirim', 'Selesai'])->default('BelumDibayar')->change();
            $table->string('konfirmasi_reseller')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pengiriman');
    }
};
