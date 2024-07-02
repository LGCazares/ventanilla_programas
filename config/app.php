<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Application Name
    |--------------------------------------------------------------------------
    |
    | This value is the name of your application, which will be used when the
    | framework needs to place the application's name in a notification or
    | other UI elements where an application name needs to be displayed.
    |
    */

    'name' => env('APP_NAME_ESTANCIA_TURISTICA', 'Laravel'),

    'description' => env('APP_DESCRIPTION_ESTANCIA_TURISTICA'),
    'description_anfitrion' => env('APP_DESCRIPTION_ANFITRION_ESTANCIA_TURISTICA'),
    'description_plataformas' => env('APP_DESCRIPTION_PLATAFORMAS_ESTANCIA_TURISTICA'),
    'dependencia' => env('APP_DEPENDENCIA_ESTANCIA_TURISTICA'),
    'keywords' => env('APP_KEYWORDS_ESTANCIA_TURISTICA'),

    # Expediente
    'url_expediente' => env('URL_EXPEDIENTE_ESTANCIA_TURISTICA', 'https://portalservicios.cdmx.gob.mx/'),
    'url_widget' => env('URL_WIDGET_ESTANCIA_TURISTICA', '//portalservicios.cdmx.gob.mx/widget/'),

    # Header & footer
    'use_frontbase' => (bool)env('USE_FRONTBASE_ESTANCIA_TURISTICA'),
    'url_header' => env('HEADER_ESTANCIA_TURISTICA'),
    'url_footer' => env('FOOTER_ESTANCIA_TURISTICA'),
    'url_favico' => env('FAVICON_ESTANCIA_TURISTICA'),
    'url_menu' => env('MENU_ESTANCIA_TURISTICA'),
    'url_aviso_privacidad' => env('AVISO_PRIVACIDAD_ESTANCIA_TURISTICA'),

    #Expediente Documentos
    /*
    |--------------------------------------------------------------------------
    | Ver si está activado, ID de cliente y frase secreta
    |--------------------------------------------------------------------------
    */
    'docs_enabled' => (bool)env('MYDOCS_ENABLED_ESTANCIA_TURISTICA', false),
    'docs_client' => env('MYDOCS_CLIENT_ESTANCIA_TURISTICA', ''),
    'docs_secret' => env('MYDOCS_SECRET_ESTANCIA_TURISTICA', ''),
    /*
    |--------------------------------------------------------------------------
    | URLs
    |--------------------------------------------------------------------------
    |
    | URL de pasarela, endpoint pasa generar solicitud y descargar archivo
    */
    'docs_gateway' => env('MYDOCS_GATEWAY_ESTANCIA_TURISTICA', ''),
    'docs_genrequest' => env('MYDOCS_GENREQUEST_ESTANCIA_TURISTICA', ''),
    'docs_getfile' => env('MYDOCS_GETFILE_ESTANCIA_TURISTICA', ''),
    /*
    |--------------------------------------------------------------------------
    | Basic Auth
    |--------------------------------------------------------------------------
    |
    | En este valor se especifica el usuario de Basic Auth que se usará 
    | para consumir el endpoint de request y download
    */
    'docs_ba_user' => env('MYDOCS_BA_USER_ESTANCIA_TURISTICA', ''),
    'docs_ba_pass' => env('MYDOCS_BA_PASS_ESTANCIA_TURISTICA', ''),

    /*
    |--------------------------------------------------------------------------
    | Application Environment
    |--------------------------------------------------------------------------
    |
    | This value determines the "environment" your application is currently
    | running in. This may determine how you prefer to configure various
    | services the application utilizes. Set this in your ".env" file.
    |
    */

    'env' => env('APP_ENV_ESTANCIA_TURISTICA', 'production'),

    /*
    |--------------------------------------------------------------------------
    | Application Debug Mode
    |--------------------------------------------------------------------------
    |
    | When your application is in debug mode, detailed error messages with
    | stack traces will be shown on every error that occurs within your
    | application. If disabled, a simple generic error page is shown.
    |
    */

    'debug' => (bool) env('APP_DEBUG_ESTANCIA_TURISTICA', false),

    /*
    |--------------------------------------------------------------------------
    | Application URL
    |--------------------------------------------------------------------------
    |
    | This URL is used by the console to properly generate URLs when using
    | the Artisan command line tool. You should set this to the root of
    | the application so that it's available within Artisan commands.
    |
    */

    'url' => env('APP_URL_ESTANCIA_TURISTICA', 'http://localhost'),
    'asset_url' => env('ASSET_URL_ESTANCIA_TURISTICA', '/'),
    /*
    |--------------------------------------------------------------------------
    | Application Timezone
    |--------------------------------------------------------------------------
    |
    | Here you may specify the default timezone for your application, which
    | will be used by the PHP date and date-time functions. The timezone
    | is set to "UTC" by default as it is suitable for most use cases.
    |
    */

    'timezone' => env('APP_TIMEZONE_ESTANCIA_TURISTICA', 'UTC'),

    /*
    |--------------------------------------------------------------------------
    | Application Locale Configuration
    |--------------------------------------------------------------------------
    |
    | The application locale determines the default locale that will be used
    | by Laravel's translation / localization methods. This option can be
    | set to any locale for which you plan to have translation strings.
    |
    */

    'locale' => env('APP_LOCALE_ESTANCIA_TURISTICA', 'en'),

    'fallback_locale' => env('APP_FALLBACK_LOCALE_ESTANCIA_TURISTICA', 'en'),

    'faker_locale' => env('APP_FAKER_LOCALE_ESTANCIA_TURISTICA', 'en_US'),

    /*
    |--------------------------------------------------------------------------
    | Encryption Key
    |--------------------------------------------------------------------------
    |
    | This key is utilized by Laravel's encryption services and should be set
    | to a random, 32 character string to ensure that all encrypted values
    | are secure. You should do this prior to deploying the application.
    |
    */

    'cipher' => 'AES-256-CBC',

    'key' => env('APP_KEY_ESTANCIA_TURISTICA'),

    'previous_keys' => [
        ...array_filter(
            explode(',', env('APP_PREVIOUS_KEYS_ESTANCIA_TURISTICA', ''))
        ),
    ],

    /*
    |--------------------------------------------------------------------------
    | Maintenance Mode Driver
    |--------------------------------------------------------------------------
    |
    | These configuration options determine the driver used to determine and
    | manage Laravel's "maintenance mode" status. The "cache" driver will
    | allow maintenance mode to be controlled across multiple machines.
    |
    | Supported drivers: "file", "cache"
    |
    */

    'maintenance' => [
        'driver' => env('APP_MAINTENANCE_DRIVER_ESTANCIA_TURISTICA', 'file'),
        'store' => env('APP_MAINTENANCE_STORE_ESTANCIA_TURISTICA', 'database'),
    ],

];
