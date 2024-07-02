<?php

namespace App\Services;

use App\AdipUtils\SimpleCURL;
use App\AdipUtils\ErrorLoggerService as Logg;

final class CURPService
{
    /**
     * Consulta de datos del ciudadano popr CURP
     *
     * @param string $curp
     * @return object
     */
    public static function consultaCurp(string $curp): object
    {
        $ret = [];
        try {
            if (strlen(trim($curp)) == 0) {
                $ret = [
                    'mensaje' => 'Se debe especificar la CURP a buscar',
                    'txApellidoPaterno' => null,
                    'txApellidoMaterno' => null,
                    'txNombres' => null
                ];
            } else {
                // Preg_match
                $pattern = '/^(([A-Z][AEIOUX][A-Z]{2}\d{2}(?:0[1-9]|1[0-2])(?:0[1-9]|[12]\d|3[01])[HM](?:AS|B[CS]|C[CLMSH]|D[FG]|G[TR]|HG|JC|M[CNS]|N[ETL]|OC|PL|Q[TR]|S[PLR]|T[CSL]|VZ|YN|ZS)[B-DF-HJ-NP-TV-Z]{3}[A-Z\d])(\d))|([A-ZÑ\x26]{4}([0-9]{2})(0[1-9]|1[0-2])(0[1-9]|1[0-9]|2[0-9]|3[0-1]))([A-Z\d]{3})?$/';
                $match = preg_match($pattern, $curp);
                if ($match === FALSE) {
                    // error
                    $ret = [
                        'mensaje' => 'Ocurrió un error al evaluar el formato de la CURP',
                        'txApellidoPaterno' => null,
                        'txApellidoMaterno' => null,
                        'txNombres' => null,
                        'success' => FALSE
                    ];
                } elseif ($match === 0) {
                    // Formato de curp no coincide
                    $ret = [
                        'mensaje' => 'La CURP no cumple con el formato especificado',
                        'txApellidoPaterno' => null,
                        'txApellidoMaterno' => null,
                        'txNombres' => null,
                        'success' => FALSE
                    ];
                } else {
                    $c = new SimpleCURL;
                    $c->setUrl(config('curp.url_consulta') . $curp);
                    $c->useAuthBasic(config('curp.usr_consulta'), config('curp.pwd_consulta'));
                    $c->isGet();
                    $c->prepare();
                    $result = $c->execute();
                    $jsonRes = json_decode($result);
                    if (NULL !== $jsonRes) {
                        if (isset($jsonRes->statusOper)) {
                            if (strtolower($jsonRes->statusOper) == 'exitoso') {
                                $ret = [
                                    'mensaje' => 'Resultado de búsqueda de CURP',
                                    'txApellidoPaterno' => $jsonRes->apellido1,
                                    'txApellidoMaterno' => $jsonRes->apellido2,
                                    'txNombres' => $jsonRes->nombres,
                                    'success' => TRUE
                                ];
                            } else {
                                $ret = [
                                    'mensaje' => 'El servicio de búsqueda de CURP no encontró la CURP buscada',
                                    'txApellidoPaterno' => null,
                                    'txApellidoMaterno' => null,
                                    'txNombres' => null,
                                    'success' => FALSE
                                ];
                            }
                        } else {
                            $l = Logg::log(__METHOD__, 'La respuesta del servicio de consulta de curp no se puede evaluar: ' . $result);
                            $ret = [
                                'mensaje' => 'La respuesta del servicio de consulta de curp no se puede evaluar',
                                'txApellidoPaterno' => null,
                                'txApellidoMaterno' => null,
                                'txNombres' => null,
                                'success' => FALSE
                            ];
                        }
                    } else {
                        // Servicio respondió algo que no es posible "Jsonizar"
                        $l = Logg::log(__METHOD__, 'El servicio de consulta de curp no respondió correctamente: ' . $c . ' Respuesta: ' . $result);
                        $ret = [
                            'mensaje' => 'El servicio de consulta de curp no respondió correctamente',
                            'txApellidoPaterno' => null,
                            'txApellidoMaterno' => null,
                            'txNombres' => null,
                            'success' => FALSE
                        ];
                    }
                }
            }
        } catch (\Throwable $t) {
            $l = Logg::log(__METHOD__, $t->getMessage());
            $ret = [
                'mensaje' => $t->getMessage(),
                'txApellidoPaterno' => null,
                'txApellidoMaterno' => null,
                'txNombres' => null,
                'success' => FALSE
            ];
        }

        return (object)$ret;
    }
}