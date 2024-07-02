<?php

namespace App\Services;

use App\AdipUtils\SimpleCURL;
use Carbon\Carbon;
use App\AdipUtils\ErrorLoggerService as Logg;


final class INEService{

    private function __construct(){}


    /**
     * Consulta de datos del INE
     * 
     * @param object $payload
     * @return object
     */
    public static function consultaIne($oPayload):object{
        try{
            if(is_object($oPayload)){
                if(property_exists($oPayload, 't')){
                    // Curp
                    if(property_exists($oPayload, 'curp')){
                        $curp = $oPayload->curp;
                    }else{
                        return (object)[
                            'mensaje' => 'El payload no es un objeto válido (curp)',
                            'codigo' => 400
                        ];
                    }
                    $tipoCredencial= $oPayload->t;
                    $nombre = $oPayload->nombre;
                    $apellidoPaterno = $oPayload->apellidoPaterno;
                    $apellidoMaterno = $oPayload->apellidoMaterno;
                    switch($tipoCredencial){
                        case 'c':{
                            if(!property_exists($oPayload, 'ocr') || trim($oPayload->ocr)==''){
                                return (object)[
                                    'mensaje' => 'No se incluyó el OCR del INE',
                                    'codigo' => 400
                                ];
                            }
                            if(!property_exists($oPayload, 'claveElector') || trim($oPayload->claveElector)==''){
                                return (object)[
                                    'mensaje' => 'No se incluyó la clave de elector',
                                    'codigo' => 400
                                ];
                            }
                            if(!property_exists($oPayload, 'numeroEmisionCredencial') || trim($oPayload->numeroEmisionCredencial)==''){
                                return (object)[
                                    'mensaje' => 'No se incluyó el numero de emisión del INE',
                                    'codigo' => 400
                                ];
                            }
                            $dataz='ocr='.$oPayload->ocr.'&claveElector='.$oPayload->claveElector.'&numeroEmisionCredencial='.$oPayload->numeroEmisionCredencial.'&curp='.$curp.'&nombre='.$nombre.'&apellidoPaterno='.$apellidoPaterno.'&apellidoMaterno='.$apellidoMaterno;
                            break;
                        }
                        case 'd':{}
                        case 'e':{
                            if(!property_exists($oPayload, 'cic') || trim($oPayload->cic)==''){
                                return (object)[
                                    'mensaje' => 'No se incluyó el CIC del INE',
                                    'codigo' => 400
                                ];
                            }
                            $dataz='cic='.$oPayload->cic.'&curp='.$curp.'&nombre='.$nombre.'&apellidoPaterno='.$apellidoPaterno.'&apellidoMaterno='.$apellidoMaterno;
                            break;
                        }
                        default:{
                            return (object)[
                                'mensaje' => 'No se especificó el tipo de credencial en el payload',
                                'codigo' => 400
                            ]; 
                        }
                    }
                    \Log::info(json_encode($dataz));
                    //
                    $client = new SimpleCURL;
                    $client->setUrl(config('wsine.url_ine'));
                    $client->useAuthBasic(config('wsine.usr_ine'), config('wsine.pwd_ine'));
                    $client->isGet();
                    $client->setData($dataz);
                    $client->prepare();
                    $result = $client->execute();
                    $oResult = json_decode($result);
                    $ineResult = json_decode($oResult->respuestaIne);
                    if(! is_object($oResult) ){
                        // REspuesta vacía o rara
                        $l=Logg::log(__METHOD__,'La respuesta del servicio de consulta de ine no se puede evaluar (no object): '.substr($result,0,2500));
                        return (object)[
                            'mensaje' => 'El servicio de consulta del INE presenta intermitencia, por favor intenta más tarde',
                            'codigo' => 502
                        ];
                    }else{
                        if(property_exists($ineResult->response->dataResponse,'respuestaSituacionRegistral')){
                            switch(strtolower($ineResult->response->dataResponse->respuestaSituacionRegistral->tipoSituacionRegistral)){
                                case 'vigente':{
                                    if($ineResult->response->dataResponse->respuestaComparacion->curp){
                                        return (object)[
                                            'mensaje' => 'Los datos de la credencial son correctos',
                                            'codigo' => 200,
                                            'respuesta' => $oResult,
                                        ];
                                    }else{
                                        return (object)[
                                            'mensaje' => 'Los datos de la credencial no son correctos.',
                                            'codigo' => 400,
                                            'respuesta' => $oResult,
                                        ];
                                    }
                                    break;
                                }
                                case 'datos_no_encontrados':{
                                    return (object)[
                                        'mensaje' => 'Los datos no coinciden con los registros del INE. Por favor verifica que la información es'.
                                            ' la correcta. En caso de que persista el error, comunícate con el INE marcando al 800 433 2000 para revisar tus datos.',
                                        'codigo' => 404,
                                        'respuesta' => $oResult,
                                    ];
                                    break;
                                }
                                case 'no_vigente':{
                                    return (object)[
                                        'mensaje' => 'La credencial no está vigente. Por favor verifica que la información es'.
                                            ' la correcta. En caso de que persista el error, comunícate con el INE marcando al 800 433 2000 para revisar tus datos.',
                                        'codigo' => 400,
                                        'respuesta' => $oResult,
                                    ];
                                    break;
                                }
                                default:{
            
                                }
                            }
                        }elseif(property_exists($oResult, 'codigo_resultado')){
                            // Mostrar "Mensaje"
                            $l=Logg::log(__METHOD__,'La respuesta del servicio de consulta de ine no se puede evaluar (codigo_resultado): '.substr($result,0,2500));
                            return (object)[
                                'mensaje' => $oResult->Mensaje,
                                'codigo' => 400,
                                'respuesta' => $oResult,
                            ];
                        }else{
                            // Respuesta rara
                            $l=Logg::log(__METHOD__,'La respuesta del servicio de consulta de ine no se puede evaluar (no properties): '.substr($result,0,2500));
                            return (object)[
                                'mensaje' => 'El servicio de consulta del INE presenta intermitencia, por favor intenta más tarde',
                                'codigo' => 502,
                                'respuesta' => $oResult,
                            ];
                        }
                    }
                    //
                }else{
                    return (object)[
                        'mensaje' => 'El payload no es un objeto válido (t)',
                        'codigo' => 400
                    ];
                }
            }else{
                return (object)[
                    'mensaje' => 'El payload no es un objeto válido',
                    'codigo' => 400
                ];
            }
        }catch(\Throwable $t){
            $l=Logg::log(__METHOD__,substr($t->getMessage(),0,2500));
            return (object)[
                'mensaje' => $t->getMessage(),
                'codigo' => 500
            ];
        }
    }
}