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
        Schema::create('dokumen', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('pegawai_id');
            $table->string('no_dokumen');
            $table->string('url');
            $table->enum('jenis', ['sipp','str','spkk']);
            $table->date('berlaku_sd');
            $table->enum('status', ['pending','ditolak','diterima'])->default('pending');
            $table->text('ket_str');
            $table->foreign('pegawai_id')->references('id')->on('pegawai');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dokumen');
    }
};
