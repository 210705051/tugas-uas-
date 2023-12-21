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
        Schema::create('acaras', function (Blueprint $table) {
            $table->id('id_acara');
            $table->string('nama_acara');
            $table->date('tgl_acara');
            $table->string('lokasi');
            $table->unsignedBigInteger('id_pen');
            $table->unsignedBigInteger('id_par');
            $table->timestamps();

            $table->foreign('id_pen')->references('id_pen')->on('penyelenggaras');
            $table->foreign('id_par')->references('id_par')->on('partisipans');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('acaras');
    }
};
