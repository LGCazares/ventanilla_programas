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
        Schema::create('t001803_error', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('tx_uuid', 50);
            $table->string('tx_nivel', 1000);
            $table->string('tx_detalle', 3000);
            $table->string('tx_request_uri', 2000);
            $table->string('tx_session_token', 1000);
            $table->integer('nu_http_response')->unsigned();
            $table->bigInteger('idUsuario')->unsigned();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('t001803_error');
    }
};
