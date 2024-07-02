<?php
/**
 * Archivo de configuración miscelanea del arquetipo
 */
return [

    /*
    |--------------------------------------------------------------------------
    | Mandrill
    |--------------------------------------------------------------------------
    |
    | Valores para consumir el API de Mandrill para el envío de correos
    | con MailFactory
    |
    */

    'mandrillsecret' => env('MANDRILL_SECRET_ESTANCIA_TURISTICA'),

    'mandrillurl' => env('MANDRILL_URL_ESTANCIA_TURISTICA'),


    /*
    |--------------------------------------------------------------------------
    | Google Maps
    |--------------------------------------------------------------------------
    |
    | En este valor se especifica el API KEY de Google Maps que usará el
    | aplicativo
    */

    'gmaps' => env('GMAPS_API_KEY_ESTANCIA_TURISTICA'),
    'gmapsback' => env('GMAPS_API_KEY_ESTANCIA_TURISTICA_BACK'),



    /*
    |--------------------------------------------------------------------------
    | Google Analytics
    |--------------------------------------------------------------------------
    |
    | En este valor se especifica el ID de Google Analytics que usará el
    | aplicativo
    */

    'gaid' => env('GANALYTICS_ID_ESTANCIA_TURISTICA'),



    /*
    |--------------------------------------------------------------------------
    | Google Recaptcha
    |--------------------------------------------------------------------------
    |
    */

    'captcha_key' => env('GCAPTCHA_KEY_ESTANCIA_TURISTICA'),
    'captcha_secret' => env('GCAPTCHA_SECRET_ESTANCIA_TURISTICA'),
    'captcha_valurl' => env('GCAPTCHA_VALIDATEURL_ESTANCIA_TURISTICA'),
    'captcha_key_v2' => env('GCAPTCHA_KEY_ESTANCIA_TURISTICA_V2'),
    'captcha_secret_v2' => env('GCAPTCHA_SECRET_ESTANCIA_TURISTICA_V2'),


    /*
    |--------------------------------------------------------------------------
    | Para habilitar o deshabilitar el home
    |--------------------------------------------------------------------------
    |
    */

    'home_disabled' => (bool)env('HOME_DISABLED_ESTANCIA_TURISTICA', false),
    'home_redirect' => env('HOME_REDIRECT_ESTANCIA_TURISTICA'),



    /*
    |--------------------------------------------------------------------------
    | Reporte de errores por correo
    |--------------------------------------------------------------------------
    |
    | En este valor se especifica un correo electrónico al cual se envian los
    | reportes de error especificados en Handler::report().
    */

    'mailing_errors' => env('ERROR_REPORT_MAIL_ESTANCIA_TURISTICA'),



    /*
    |--------------------------------------------------------------------------
    | Prevenir session-hijacking
    |--------------------------------------------------------------------------
    |
    | En este valor se especifica TRUE o FALSE para indicar si se cierra la
    | sesión al cambiar el user agent. Predeterminado: TRUE
    */

    'validate_ua' => env('VALIDATE_UA_ESTANCIA_TURISTICA', TRUE),



    /*
    |--------------------------------------------------------------------------
    | Prevenir session-hijacking
    |--------------------------------------------------------------------------
    |
    | En este valor se especifica TRUE o FALSE para indicar si se cierra la
    | sesión al cambiar la IP. Predeterminado: TRUE
    */

    'validate_ip' => env('VALIDATE_IP_ESTANCIA_TURISTICA', TRUE),



    /*
    |--------------------------------------------------------------------------
    | Basic Auth
    |--------------------------------------------------------------------------
    |
    | En este valor se especifica el usuario de Basic Auth que usarán otras
    | aplicaciones para consumir servicios expuestos que usen dicho tipo de
    | autenticación
    */

    'basic_auth_usr' => env('BA_USER_ESTANCIA_TURISTICA'),
    'basic_auth_pwd' => env('BA_PASSWORD_ESTANCIA_TURISTICA'),



    /*
    |--------------------------------------------------------------------------
    | Chat de Locatel
    |--------------------------------------------------------------------------
    |
    | En este valor se especifica si la aplicación usará el widget de chat
    | de Locatel.
    | autenticación
    */

    'locatel_enabled' => (bool)env('CHAT_ENABLED_ESTANCIA_TURISTICA'),
    'locatel_domain' => env('CHAT_DOMAIN_ESTANCIA_TURISTICA'),



    /*
    |--------------------------------------------------------------------------
    | Zona de invitados
    |--------------------------------------------------------------------------
    |
    | En este valor se indica el nombre que tendrá la zona de invitados.
    | Considerar que el acceso a la zona de invitados por URL varia de
    | acuerdo a cómo está instalada la aplicación:
    |
    |   https://misistema.cdmx.gob.mx/{guest_zone}
    |   https://subdominio.cdmx.gob.mx/mi-sistema/public/{guest_zone}
    |
    | El valor establecido en esta variable debe coincidir con la constante
    |
    |   App\Providers\RouteServiceProvider::HOME_INVITADO
    |
    | Ej. Si el nombre de la zona de invitados es "proveedores"
    | La constante deberá declararse como:
    |
    |   public const HOME_INVITADO = '/proveedores';
    */

    'guest_zone' => env('ZONA_INVITADOS_ESTANCIA_TURISTICA', 'invitados'),
    'guest_zone_enabled' => env('ZONA_INVITADOS_ENABLED_ESTANCIA_TURISTICA', 'invitados'),

];
