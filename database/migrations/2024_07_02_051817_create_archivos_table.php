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
        Schema::create('t001301_archivo_app', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nb_archivo', 256);
            $table->string('tx_mime_type', 150);
            $table->bigInteger('nu_tamano')->unsigned();
            $table->string('tx_uuid', 50);
            $table->string('tx_sha256', 100);
            $table->bigInteger('usr_alta')->nullable();
            $table->timestamp('fh_borrado')->nullable();
            $table->bigInteger('usr_borra')->nullable();
            $table->integer('st_public')->default(0);
            $table->boolean('es_docto_expediente')->default(false);
            $table->integer('id_documento_expediente')->nullable();
            $table->boolean('docto_expediente_validado')->nullable();
            $table->integer('id_subclasificacion_expediente')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('t001301_archivo_app');
    }
};
