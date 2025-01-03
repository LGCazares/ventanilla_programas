<?php

namespace App\Http\Controllers\Api;

use App\AdipUtils\ErrorLoggerService as Logg;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Auxiliar;
use Exception;
use Auth;

class ApiController extends Controller
{
    /**
     * Especificar la cadena de identificación del navegador que ha de enviar
     * en cliente en la petición
     */
    private const USER_AGENT = 'Mozilla/5.0 (Windows NT 10.0; WOW64) ADIP(CDMX)/Endpoint Client';

    // Activar o desactivar validaciones
    // de user-agent y dependencia-id
    private $validateUA = TRUE;
    private $validateDependencia = TRUE;

    // Identificador de peticion (no editar)
    private $requuid;


    /**
     * Metodo de ejemplo que muestra los datos de la app que consume la API
     */
    public function register(Request $r){
        // Estas sección es obligatoria, no eliminar
        // (Valida user-agent y/o dependencia-id)
        if(!$this->validateRequest($r)){
            return \Response::json([
                'mensaje' => 'No permitido',
                'codigo' => 403
            ], 403);
        }
        // Comenzar aquí el cuerpo del método
        return Auth::user();
    }

    /**
     * Insertar aquí los nuevos métodos
     */
    // public function miSuperMetodo(Request $r){
        // Estas sección es obligatoria, no eliminar
        // (Valida user-agent y/o dependencia-id)
        // if(!$this->validateRequest($r)){
        //     return \Response::json([
        //         'mensaje' => 'No permitido',
        //         'codigo' => 403
        //     ], 403);
        // }
        // Comenzar aquí el cuerpo del método

    // }

    /*
     *No editar a partir de aquí
     */
    private function validateRequest(Request $rr):bool{
        // Asignarle identificador a la petición
        $this->requuid = Str::uuid()->toString();
        session()->put('requuid', $this->requuid);
        // Validacion
        $validated=TRUE;
        // 'Authorization' => 'Bearer '.$token,
        if($this->validateUA){
            if($rr->header('User-Agent') === NULL || $rr->header('User-Agent') !== self::USER_AGENT ){
                Logg::log(__METHOD__,'La petición no superó la prueba (user-agent)', 403);
                $validated=FALSE;
            }
        }

        if($this->validateDependencia){
            if($rr->header('dependencia-id') === NULL ){
                Logg::log(__METHOD__,'La petición no superó la prueba (dependencia id)', 403);
                $validated=FALSE;
            }
        }
        return $validated;
    }
}
