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
            $table->string('nama');
            $table->string('site')->nullable();
            $table->date('tanggal_pemasangan')->nullable();
            $table->time('waktu')->nullable();
            $table->string('nama_teknisi')->nullable();
            // $table->string('FDT');
            // $table->string('ODP');
            $table->string('hasil_redaman')->nullable();
            $table->string('status_pemasangan')->nullable();
            $table->text('kebutuhan_Access_Point')->nullable();
            $table->text('SN_Access_Point')->nullable();
            $table->text('kebutuhan_HTB')->nullable();
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
