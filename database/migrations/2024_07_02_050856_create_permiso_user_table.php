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
        Schema::create('permiso_user', function (Blueprint $table) {
            $table->integer('id_permiso')->unsigned();
            $table->integer('id_usuario')->unsigned();
            // Relacion
            $table->foreign('id_usuario')->references('idUsuario')->on('users')->onDelete('cascade');
            $table->foreign('id_permiso')->references('id')->on('permisos');
            $table->primary(['id_usuario', 'id_permiso']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::statement('drop table if exists permiso_user cascade');
    }
};
