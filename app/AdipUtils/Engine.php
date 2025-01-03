<?php

namespace App\AdipUtils;

/**
 *
 */
final class Engine{

    /**
     * Fecha del arquetipo
     *
     */
    public const BUILD_DATE = '2022-07-06 01:25 UTC -5';



    /**
     * Desactiva la instanciación de la clase
     *
     */
    private function __construct(){

    }


    /**
     * URL Base para invitados (doble login)
     *
     * @return String
     */
    public static function guestZone():String{
        return config('engine.guest_zone', 'invitados');
    }



    /**
     * Determinar si la zona de invitados está activa o no.
     *
     * @return bool
     */
    public static function hasGuestZone():bool{
        $b = (bool)config('engine.guest_zone_enabled');
        return $b;
    }



}
