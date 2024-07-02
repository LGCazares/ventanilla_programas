<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Services\CURPService as WSCurp;

class ExampleWSCurp extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'examples:WSCurp';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Ejemplo de como usar el CURPService';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        //$curp = 'PXNE660720HMCXTN06';
        $curp='';
        $result = WSCurp::consultaCurp($curp);
        
        var_dump($result);
    }
}
