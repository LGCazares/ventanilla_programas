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
        Schema::create('users', function (Blueprint $table) {
            $table->bigInteger('idUsuario')->unsigned();
            $table->string('login',150);
            $table->string('nombre',100);
            $table->string('primerApellido',100);
            $table->string('segundoApellido',100);
            $table->string('telVigente',10)->nullable();
            $table->string('curp',18);
            $table->datetime('fechaNacimiento');
            $table->string('sexo',25);
            $table->integer('idEstadoNacimiento')->unsigned();
            $table->string('estadoNacimiento',50);
            $table->integer('idRolUsuario')->unsigned()->nullable();
            $table->string('descripcionRol',100)->nullable();
            
            $table->primary('idUsuario');
        });

        Schema::create('password_reset_tokens', function (Blueprint $table) {
            $table->string('email')->primary();
            $table->string('token');
            $table->timestamp('created_at')->nullable();
        });

        Schema::create('sessions', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->foreignId('user_id')->nullable()->index();
            $table->string('ip_address', 45)->nullable();
            $table->text('user_agent')->nullable();
            $table->longText('payload');
            $table->integer('last_activity')->index();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
        Schema::dropIfExists('password_reset_tokens');
        Schema::dropIfExists('sessions');
    }
};
