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

    'idcliente' => env('LLAVE_CLIENT_ID_VUPS'),

    
    /*
    |--------------------------------------------------------------------------
    | Redirección al iniciar sesion
    |--------------------------------------------------------------------------
    |
    | En este valor se especifica la URL a la que direcciona el sistema llave
    | una vez que se lleve a cabo un inicio de sesión exitoso.
    |
    */

    'redirect' => env('LLAVE_URL_REDIRECT_VUPS'),

    
    /*
    |--------------------------------------------------------------------------
    | Código Secreto
    |--------------------------------------------------------------------------
    |
    | En este atributo se especifica el código secreto proporcionado por el
    | administrador del sistema Llave.
    |
    */

    'secret' => env('LLAVE_APP_SECRET_VUPS'),


    /*
    |--------------------------------------------------------------------------
    | Servicios Llave
    |--------------------------------------------------------------------------
    |
    | Estos atributos especifican end-points del sistema Llave, son los
    | mismos para cualquier sistema.
    |
    */

    'server' => env('LLAVE_SERVER_VUPS'),

    'gettoken' => env('LLAVE_GET_TOKEN_VUPS'),

    'getuser' => env('LLAVE_GET_USER_VUPS'),

    'getroles' => env('LLAVE_GET_ROLES_VUPS'),

    'createaccount' => env('LLAVE_CREATE_ACCOUNT_VUPS'),

    'logout' => env('LLAVE_LOGOUT_VUPS'),

    'sso' => (int)env('LLAVE_SSO_ENABLED_VUPS'),

    /*
    |--------------------------------------------------------------------------
    | Auth Basic
    |--------------------------------------------------------------------------
    |
    | Atributos para especificar las credenciales de los servicios  Basic-Auth
    | de los end-points de Llave
    |
    */

    'domainuser' => env('LLAVE_DOMAIN_USER_VUPS'),
    'domainpassword' => env('LLAVE_DOMAIN_PASSWORD_VUPS'),

    /*
     * Endpoint para obtener usuarios mediante un rol especifico 
     */

    'situacionRol' => env('LLAVE_SITUACION_ROL_VUPS'),

];
