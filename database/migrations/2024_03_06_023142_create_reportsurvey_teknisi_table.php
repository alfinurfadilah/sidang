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
        Schema::create('reportsurvey_teknisi', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_reportsurvey')->nullable();
            $table->foreign('id_reportsurvey')->references('id')->on('reportsurvey')->onDelete('cascade')->onUpdate('cascade')->nullable();
            $table->unsignedBigInteger('id_teknisi')->nullable();
            $table->foreign('id_teknisi')->references('id')->on('teknisi')->onDelete('cascade')->onUpdate('cascade')->nullable();
            // Tambahkan kolom lain sesuai kebutuhan
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
        Schema::dropIfExists('reportsurvey_teknisi');
    }
};
