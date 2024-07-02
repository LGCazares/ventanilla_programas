<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Client ID
    |--------------------------------------------------------------------------
    |
    | Especificar en este atributo el ID de sistema proporcionado por el
    | administrador del sistema Llave
    |
    */

    'idcliente' => env('LLAVE_CLIENT_ID_ESTANCIA_TURISTICA'),

    
    /*
    |--------------------------------------------------------------------------
    | Redirección al iniciar sesion
    |--------------------------------------------------------------------------
    |
    | En este valor se especifica la URL a la que direcciona el sistema llave
    | una vez que se lleve a cabo un inicio de sesión exitoso.
    |
    */

    'redirect' => env('LLAVE_URL_REDIRECT_ESTANCIA_TURISTICA'),

    
    /*
    |--------------------------------------------------------------------------
    | Código Secreto
    |--------------------------------------------------------------------------
    |
    | En este atributo se especifica el código secreto proporcionado por el
    | administrador del sistema Llave.
    |
    */

    'secret' => env('LLAVE_APP_SECRET_ESTANCIA_TURISTICA'),


    /*
    |--------------------------------------------------------------------------
    | Servicios Llave
    |--------------------------------------------------------------------------
    |
    | Estos atributos especifican end-points del sistema Llave, son los
    | mismos para cualquier sistema.
    |
    */

    'server' => env('LLAVE_SERVER_ESTANCIA_TURISTICA'),

    'gettoken' => env('LLAVE_GET_TOKEN_ESTANCIA_TURISTICA'),

    'getuser' => env('LLAVE_GET_USER_ESTANCIA_TURISTICA'),

    'getroles' => env('LLAVE_GET_ROLES_ESTANCIA_TURISTICA'),

    'createaccount' => env('LLAVE_CREATE_ACCOUNT_ESTANCIA_TURISTICA'),

    'logout' => env('LLAVE_LOGOUT_ESTANCIA_TURISTICA'),

    'sso' => (int)env('LLAVE_SSO_ENABLED_ESTANCIA_TURISTICA'),

    /*
    |--------------------------------------------------------------------------
    | Auth Basic
    |--------------------------------------------------------------------------
    |
    | Atributos para especificar las credenciales de los servicios  Basic-Auth
    | de los end-points de Llave
    |
    */

    'domainuser' => env('LLAVE_DOMAIN_USER_ESTANCIA_TURISTICA'),
    'domainpassword' => env('LLAVE_DOMAIN_PASSWORD_ESTANCIA_TURISTICA'),

    /*
     * Endpoint para obtener usuarios mediante un rol especifico 
     */

    'situacionRol' => env('LLAVE_SITUACION_ROL_ESTANCIA_TURISTICA'),

];
