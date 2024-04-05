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
        Schema::create('datapembayaran', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_paket');
            $table->foreign('id_paket')->references('id')->on('paket')->onDelete('cascade');
            $table->string('id_pelanggan');
            $table->string('nama');
            // $table->string('Nama_Paket');
            $table->string('harga_paket');
            $table->boolean('payment_status')->default(false);
            $table->string('bulan');
            $table->string('tahun');
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
        Schema::dropIfExists('datapelanggan');
    }
};
