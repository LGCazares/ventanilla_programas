<?php

namespace Database\Seeders;

use App\Models\Invitado;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class InvitadosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Invitado::updateOrCreate(
            [
                'email' => 'invitado@adip.io'
            ],[
                'tx_apellido_paterno' => 'Invitado',
                'tx_apellido_materno' => 'Arquetipo',
                'tx_nombre' => 'Usuario',
                'password' => bcrypt('include soap transfer plastic label')
            ]
        );
    }
}
