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
        Schema::create('detail_spkk', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('dok_id');
            $table->string('kompetensi');
            $table->string('no_spkk');
            $table->date('berlaku_sd');
            $table->text('ket_spkk');
            $table->enum('status', ['pending','ditolak','diterima'])->default('pending');
            $table->foreign('dok_id')->references('id')->on('dokumen');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detail_spkk');
    }
};
