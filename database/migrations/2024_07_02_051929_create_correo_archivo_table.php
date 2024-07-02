<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('t001500_correo_archivo', function (Blueprint $table) {
            $table->bigInteger('id_correo')->unsigned();
            $table->bigInteger('id_archivo')->unsigned();

            $table->foreign('id_correo')->references('id')->on('carnet.t001300_correo_app');
            $table->foreign('id_archivo')->references('id')->on('carnet.t001301_archivo_app');

            $table->primary(['id_correo','id_archivo']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('t001500_correo_archivo');
    }
};
