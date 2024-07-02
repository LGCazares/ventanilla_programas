<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('t001801_sesion_log', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('ix_token',1000);
            $table->string('tx_mensaje',1000);
            $table->datetime('fh_registra');

            // Relacion
            $table->foreign('ix_token')->references('ix_token')->on('carnet.t001800_sesion')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::statement('drop table if exists t001801_sesion_log cascade');
    }
};
