<?php

namespace Database\Seeders;

use App\Models\Permiso;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PermisosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Permiso::updateOrCreate(['id' => Permiso::CIUDADANO],['nb_permiso' => Permiso::NB_CIUDADANO]);
        Permiso::updateOrCreate(['id' => Permiso::ADMINISTRADOR],['nb_permiso' => Permiso::NB_ADMINISTRADOR]);
        Permiso::updateOrCreate(['id' => Permiso::TURISMO],['nb_permiso' => Permiso::NB_TURISMO]);
        Permiso::updateOrCreate(['id' => Permiso::SEDUVI],['nb_permiso' => Permiso::NB_SEDUVI]);
    }
}
