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
        Schema::create('datacekcoverage', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_calon_pelanggan');
            $table->foreign('id_calon_pelanggan')->references('id')->on('datacalonpelanggan')->onDelete('cascade');
            $table->string('nama');
            $table->string('nomor_handphone');
            $table->string('nama_paket');
            $table->string('alamat_pemasangan');
            $table->string('titik_kordinat');
            $table->text('hasil_soft_survey')->nullable();
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
        Schema::dropIfExists('datacekcoverage');
    }
};
