<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\AdipUtils\MailFactory;
use App\Models\Correo;

class LlaveCorreoDePrueba extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'engine:test-correo';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Enviar correo de prueba';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $too = 'underdog1987@yandex.ua';
        $html = view('engine.correotest')->render();
        $foo = MailFactory::sendMail(
            new Correo([
                'tx_from' => config('mail.from.address')
                ,'tx_to' => $too
                ,'tx_subject' => 'Correo de prueba'
                ,'tx_body' => $html
                ,'nu_priority' => 0        
            ])
        );

        $this->info('['.date('Y-m-d H:i:s').'] [MailFactory] Se envió un correo de prueba a '.$too);
    }
}
