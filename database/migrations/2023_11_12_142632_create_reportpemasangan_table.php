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
        Schema::create('reportpemasangan', function (Blueprint $table) {
            $table->id();
            $table->string('Nama');
            $table->string('Site');
            $table->datetime('Tanggal');
            $table->datetime('Waktu');
            $table->string('Nama Teknisi');
            $table->string('FDT');
            $table->string('ODP');
            $table->string('Hasil Redaman');
            $table->string('Status Pemasangan');
            $table->text('Foto OPM');
            $table->text('Foto Modem');
            $table->unsignedBigInteger('id_jadwalpemasangan');
            $table->foreign('id_jadwalpemasangan')->references('id')->on('jadwalpemasangan')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('reportpemasangan');
    }
};
