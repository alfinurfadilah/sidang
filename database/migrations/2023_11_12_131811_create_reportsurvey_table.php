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
        Schema::create('reportsurvey', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            // $table->string('site')->nullable();
            $table->date('tanggal_survey')->nullable();
            $table->string('waktu')->nullable();
            $table->string('nama_teknisi')->nullable();
            // $table->string('FDT')->nullable();
            // $table->string('ODP')->nullable();
            // $table->string('kabel')->nullable();
            // $table->string('clamp')->nullable();
            // $table->string('kabel_tis')->nullable();
            // $table->string('fascon')->nullable();
            $table->string('hard_survey')->nullable();
            $table->enum('status', ['Bisa Dipasang', 'Tidak Bisa Dipasang']);
            $table->unsignedBigInteger('id_jadwalsurvey');
            $table->foreign('id_jadwalsurvey')->references('id')->on('jadwalsurvey')->onDelete('cascade')->onUpdate('cascade');
            $table->unsignedBigInteger('id_site');
            $table->foreign('id_site')->references('id')->on('site')->onDelete('cascade');
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
        Schema::dropIfExists('reportsurvey');
    }
};
