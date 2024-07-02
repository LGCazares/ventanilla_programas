<?php

namespace App\AdipUtils;

final class Constants
{

    /**
     * Desactivar instanciación de clase
     */
    private function __construct()
    {
    }

    // Response
    public const SI = 1;
    public const NO = 2;

    // Status
    public const ACTIVO = 1;
    public const NO_ACTIVO = 2;

    // Paginador
    public const RESULTS_PER_PAGE = 15;

    // EMAILS "notificaciones"
    public const NUEVO_TRAMITE = 1; 
    public const APROBACION = 2;
    public const PREVENCION = 3;
    public const NO_SUBSANAR_PREVENCION = 4;
    public const RECHAZO = 5;
    public const ESPERA_PAGO = 6;

    // EMAILS "tipo"
    public const PDF_NEGATIVA = 1;
    public const PDF_ACEPTACION = 2;
    public const PDF_REQUERIMIENTO = 3;
    
    /**
     * Devuelve una representació de texto correspondiente
     * al mes dado por $m
     *
     * @param int $m
     * @return String
     */
    public static function mes($m): String
    {
        $m = (int)$m;
        $m = $m > 12 ? 0 : $m;
        $m = $m < 0 ? 0 : $m;
        $meses = [
            '', 'Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre',
        ];

        return $meses[$m];
    }
}
