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
        Schema::create('apps_api', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nb_aplicacion', 250);
            $table->string('tx_descripcion_app', 250);
            $table->string('api_token', 80)->unique();
            $table->tinyInteger('st_activo')->unsigned()->defaut(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('apps_api');
    }
};
