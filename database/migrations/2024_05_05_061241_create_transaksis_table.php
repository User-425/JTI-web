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
        Schema::create('transaksis', function (Blueprint $table) {
            $table->id();
            // $table->String('id_transaksi', 10) -> unique;
            $table->enum('jenis', ['Tunai', 'Non-Tunai'])-> default ('tunai');
            $table->timestamp('waktu');
            $table->String('id_pegawai', 10);
            $table->String('id_pembeli', 10);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transaksis');
    }
};
