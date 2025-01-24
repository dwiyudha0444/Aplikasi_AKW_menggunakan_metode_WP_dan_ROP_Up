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
        Schema::table('pemesanan', function (Blueprint $table) {
            $table->string('status_pengiriman')->default('pending')->after('image_bukti_tf'); // Menambahkan kolom status_pengiriman setelah kolom terakhir yang ada
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('pemesanan', function (Blueprint $table) {
            $table->dropColumn('status_pengiriman'); // Menghapus kolom status_pengiriman jika migrasi di-rollback
        });
    }
};