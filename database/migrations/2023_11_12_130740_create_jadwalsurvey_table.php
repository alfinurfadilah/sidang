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
        Schema::create('jadwalsurvey', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_cekcoverage');
            $table->foreign('id_cekcoverage')->references('id')->on('datacekcoverage')->onDelete('cascade');
            $table->string('nama');
            $table->string('nomor_handphone');
            $table->string('nama_paket');
            $table->string('alamat_pemasangan');
            $table->string('titik_kordinat');
            $table->string('hasil_soft_survey');
            $table->date('tanggal_survey')->nullable();
            $table->time('waktu')->nullable();
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
        Schema::dropIfExists('jadwalsurvey');
    }
};
