<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jadwalpemasangan', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('nomor_handphone')->nullable();
            $table->enum('nama_paket', ['ALPHA', 'BETA', 'GAMMA', 'KENDA', 'SELESA']);
            $table->string('alamat_pemasangan')->nullable();
            $table->string('tanggal_pemasangan')->nullable();
            $table->time('waktu')->nullable();
            $table->string('titik_kordinat')->nullable();
            $table->unsignedBigInteger('id_jadwalsurvey')->nullable();
            $table->unsignedBigInteger('id_reportsurvey')->nullable();
            $table->foreign('id_jadwalsurvey')->references('id')->on('jadwalsurvey')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('id_reportsurvey')->references('id')->on('reportsurvey')->onDelete('cascade')->onUpdate('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('jadwalpemasangan');
    }
};
