<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Services\INEService as WSIne;

class ExampleWSIne extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'examples:WSIne';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Ejemplo de como usar el INEService';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        // Payload de ejemplo
        $oPayload = (object)[
            'claveElector' => 'GRZRFL64082209H200',
            'numeroEmisionCredencial' => '03',
            'ocr' => '5496005965849',
            't' => 'c'
        ];

        $result = WSIne::consultaIne($oPayload);

        var_dump($result);
    }
}
