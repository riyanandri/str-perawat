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
        Schema::create('pegawai', function (Blueprint $table) {
            $table->id();
            $table->string('nip')->unique();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('status_id');
            $table->enum('gender', ['L','P']);
            $table->string('tempat_lahir');
            $table->date('tgl_lahir');
            $table->string('pend_terakhir');
            $table->text('alamat');
            $table->unsignedBigInteger('profesi_id');
            $table->unsignedBigInteger('ruangan_id');
            $table->unsignedBigInteger('pk_id');
            $table->unsignedBigInteger('area_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('status_id')->references('id')->on('status_pegawai');
            $table->foreign('profesi_id')->references('id')->on('profesi');
            $table->foreign('ruangan_id')->references('id')->on('ruangan');
            $table->foreign('pk_id')->references('id')->on('jenis_pk');
            $table->foreign('area_id')->references('id')->on('area');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pegawai');
    }
};
