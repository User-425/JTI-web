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
        Schema::create('r_peny_prods', function (Blueprint $table) {
            $table->id();
            $table->string('id_produk',10);
            $table->string('id_penyediaan',10);
            $table->integer('jumlah',10);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('r_peny_prods');
    }
};
