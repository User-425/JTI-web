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
        Schema::create('penyediaans', function (Blueprint $table) {
            $table->id();
            $table->string('id_penyediaan',10)->unique();
            $table->timestamp('waktu');
            $table->string('id_pemasok',10);
            $table->string('id_pegawai',10);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('penyediaans');
    }
};
