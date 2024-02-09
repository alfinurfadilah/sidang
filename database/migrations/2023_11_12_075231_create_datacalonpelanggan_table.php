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
        Schema::create('datacalonpelanggan', function (Blueprint $table) {
            $table->id();
            $table->string('Nama');
            $table->string('Foto', 255);
            $table->string('Nomor_Handphone');
            $table->enum('Nama_Paket', ['ALPHA', 'BETA', 'GAMMA', 'KENDA', 'SELESA']);
            $table->string('Alamat_Pemasangan');
            $table->char('Titik_Kordinat');
            // $table->text('Hasil_Soft_Survey')->nullable();
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
        Schema::dropIfExists('datacalonpelanggan');
    }
};
