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
        Schema::create('t001300_correo_app', function (Blueprint $table) {
            $table->bigIncrements('id');
            // Datos propios del correo
            $table->string('tx_from', 250);
            $table->string('tx_to', 5000);
            $table->string('tx_cc', 5000)->nullable();
            $table->string('tx_cco', 5000)->nullable();
            $table->string('tx_subject', 250);
            $table->string('tx_body', 65536); // 64K
            $table->smallInteger('nu_priority')->default(0); // 0 no importante, 1 sí 
            $table->string('tx_mandrill_id',64)->nullable();
            $table->string('tx_reject_reason',250)->nullable();
            // Control
            $table->smallInteger('st_enviado')->default(0); //
            $table->smallInteger('nu_intentos')->default(0); //
            $table->timestamp('fh_enviado')->nullable(); //
            $table->smallInteger('st_activo')->unsigned()->default(1);
            $table->timestamp('fh_proximo_intento')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::statement('drop table if exists t001300_correo_app cascade');
    }
};
