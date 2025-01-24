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
            $table->foreignId('id_pemesanan')->constrained('pemesanan')->onDelete('cascade'); // Relasi dengan tabel pemesanan
            $table->integer('rating')->nullable(); // Kolom rating
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