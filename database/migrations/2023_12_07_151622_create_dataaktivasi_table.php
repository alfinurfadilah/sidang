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
        Schema::create('dataaktivasi', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('nomor_handphone');
            $table->string('tanggal_aktivasi');
            $table->string('user_PPOE');
            $table->string('password_PPOE');
            $table->datetime('sn_ONT');
            $table->string('nama_paket');
            $table->string('status');
            $table->unsignedBigInteger('id_reportpemasangan');
            $table->foreign('id_reportpemasangan')->references('id')->on('reportpemasangan')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('dataaktivasi');
    }
};
