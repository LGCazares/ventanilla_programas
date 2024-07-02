<?php

namespace Database\Seeders;

use App\Models\ApiApp;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class AppApiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ApiApp::create([
            'nb_aplicacion' => 'App1 WS'
            ,'tx_descripcion_app' => 'Aplicacionde prueba'
            ,'api_token' => Str::random(80)
            ,'st_activo' => 1
            ,'created_at' => date('Y-m-d H:i:s')
            ,'updated_at' => date('Y-m-d H:i:s')
        ]);
    }
}
