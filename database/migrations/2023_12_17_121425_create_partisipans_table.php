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
        Schema::create('partisipans', function (Blueprint $table) {
            $table->id('id_par');
            $table->string('nama_par');
            $table->string('email');
            $table->string('kontak');
            $table->text('alamat');
            $table->date('tgl_reg');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('partisipans');
    }
};
