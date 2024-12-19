<?php

use Illuminate\Support\Str;

return [

    /*
    |--------------------------------------------------------------------------
    | Default Database Connection Name
    |--------------------------------------------------------------------------
    |
    | Here you may specify which of the database connections below you wish
    | to use as your default connection for database operations. This is
    | the connection which will be utilized unless another connection
    | is explicitly specified when you execute a query / statement.
    |
    */

    'default' => env('DB_CONNECTION_ESTANCIA_TURISTICA', 'sqlite'),

    /*
    |--------------------------------------------------------------------------
    | Database Connections
    |--------------------------------------------------------------------------
    |
    | Below are all of the database connections defined for your application.
    | An example configuration is provided for each database system which
    | is supported by Laravel. You're free to add / remove connections.
    |
    */

    'connections' => [

        'sqlite' => [
            'driver' => 'sqlite',
            'url' => env('DB_URL_ESTANCIA_TURISTICA'),
            'database' => env('DB_DATABASE_ESTANCIA_TURISTICA', database_path('database.sqlite')),
            'prefix' => '',
            'foreign_key_constraints' => env('DB_FOREIGN_KEYS', true),
        ],

        'mysql' => [
            'driver' => 'mysql',
            'url' => env('DB_URL_ESTANCIA_TURISTICA'),
            'host' => env('DB_HOST_ESTANCIA_TURISTICA', '127.0.0.1'),
            'port' => env('DB_PORT_ESTANCIA_TURISTICA', '3306'),
            'database' => env('DB_DATABASE_ESTANCIA_TURISTICA', 'laravel'),
            'username' => env('DB_USERNAME_ESTANCIA_TURISTICA', 'root'),
            'password' => env('DB_PASSWORD_ESTANCIA_TURISTICA', ''),
            'unix_socket' => env('DB_SOCKET', ''),
            'charset' => env('DB_CHARSET', 'utf8mb4'),
            'collation' => env('DB_COLLATION', 'utf8mb4_unicode_ci'),
            'prefix' => '',
            'prefix_indexes' => true,
            'strict' => true,
            'engine' => null,
            'options' => extension_loaded('pdo_mysql') ? array_filter([
                PDO::MYSQL_ATTR_SSL_CA => env('MYSQL_ATTR_SSL_CA'),
            ]) : [],
        ],

        'mariadb' => [
            'driver' => 'mariadb',
            'url' => env('DB_URL_ESTANCIA_TURISTICA'),
            'host' => env('DB_HOST_ESTANCIA_TURISTICA', '127.0.0.1'),
            'port' => env('DB_PORT_ESTANCIA_TURISTICA', '3306'),
            'database' => env('DB_DATABASE_ESTANCIA_TURISTICA', 'laravel'),
            'username' => env('DB_USERNAME_ESTANCIA_TURISTICA', 'root'),
            'password' => env('DB_PASSWORD_ESTANCIA_TURISTICA', ''),
            'unix_socket' => env('DB_SOCKET', ''),
            'charset' => env('DB_CHARSET', 'utf8mb4'),
            'collation' => env('DB_COLLATION', 'utf8mb4_unicode_ci'),
            'prefix' => '',
            'prefix_indexes' => true,
            'strict' => true,
            'engine' => null,
            'options' => extension_loaded('pdo_mysql') ? array_filter([
                PDO::MYSQL_ATTR_SSL_CA => env('MYSQL_ATTR_SSL_CA'),
            ]) : [],
        ],

        'pgsql' => [
            'driver' => 'pgsql',
            'url' => env('DB_URL_ESTANCIA_TURISTICA'),
            'host' => env('DB_HOST_ESTANCIA_TURISTICA', '127.0.0.1'),
            'port' => env('DB_PORT_ESTANCIA_TURISTICA', '5432'),
            'database' => env('DB_DATABASE_ESTANCIA_TURISTICA', 'laravel'),
            'username' => env('DB_USERNAME_ESTANCIA_TURISTICA', 'root'),
            'password' => env('DB_PASSWORD_ESTANCIA_TURISTICA', ''),
            'charset' => env('DB_CHARSET_ESTANCIA_TURISTICA', 'utf8'),
            'prefix' => '',
            'prefix_indexes' => true,
            'search_path' => 'public',
            'sslmode' => 'prefer',
        ],

        'sqlsrv' => [
            'driver' => 'sqlsrv',
            'url' => env('DB_URL_ESTANCIA_TURISTICA'),
            'host' => env('DB_HOST_ESTANCIA_TURISTICA', 'localhost'),
            'port' => env('DB_PORT_ESTANCIA_TURISTICA', '1433'),
            'database' => env('DB_DATABASE_ESTANCIA_TURISTICA', 'laravel'),
            'username' => env('DB_USERNAME_ESTANCIA_TURISTICA', 'root'),
            'password' => env('DB_PASSWORD_ESTANCIA_TURISTICA', ''),
            'charset' => env('DB_CHARSET_ESTANCIA_TURISTICA', 'utf8'),
            'prefix' => '',
            'prefix_indexes' => true,
            // 'encrypt' => env('DB_ENCRYPT', 'yes'),
            // 'trust_server_certificate' => env('DB_TRUST_SERVER_CERTIFICATE', 'false'),
        ],

    ],

    /*
    |--------------------------------------------------------------------------
    | Migration Repository Table
    |--------------------------------------------------------------------------
    |
    | This table keeps track of all the migrations that have already run for
    | your application. Using this information, we can determine which of
    | the migrations on disk haven't actually been run on the database.
    |
    */

    'migrations' => [
        'table' => 'migrations',
        'update_date_on_publish' => true,
    ],

    /*
    |--------------------------------------------------------------------------
    | Redis Databases
    |--------------------------------------------------------------------------
    |
    | Redis is an open source, fast, and advanced key-value store that also
    | provides a richer body of commands than a typical key-value system
    | such as Memcached. You may define your connection settings here.
    |
    */

    'redis' => [

        'client' => env('REDIS_CLIENT_ESTANCIA_TURISTICA', 'phpredis'),

        'options' => [
            'cluster' => env('REDIS_CLUSTER_ESTANCIA_TURISTICA', 'redis'),
            'prefix' => env('REDIS_PREFIX_ESTANCIA_TURISTICA', Str::slug(env('APP_NAME_ESTANCIA_TURISTICA', 'laravel'), '_').'_database_'),
        ],

        'default' => [
            'url' => env('REDIS_URL_ESTANCIA_TURISTICA'),
            'host' => env('REDIS_HOST_ESTANCIA_TURISTICA', '127.0.0.1'),
            'username' => env('REDIS_USERNAME_ESTANCIA_TURISTICA'),
            'password' => env('REDIS_PASSWORD_ESTANCIA_TURISTICA'),
            'port' => env('REDIS_PORT_ESTANCIA_TURISTICA', '6379'),
            'database' => env('REDIS_DB_ESTANCIA_TURISTICA', '0'),
        ],

        'cache' => [
            'url' => env('REDIS_URL_ESTANCIA_TURISTICA'),
            'host' => env('REDIS_HOST_ESTANCIA_TURISTICA', '127.0.0.1'),
            'username' => env('REDIS_USERNAME_ESTANCIA_TURISTICA'),
            'password' => env('REDIS_PASSWORD_ESTANCIA_TURISTICA'),
            'port' => env('REDIS_PORT_ESTANCIA_TURISTICA', '6379'),
            'database' => env('REDIS_CACHE_DB_ESTANCIA_TURISTICA', '1'),
        ],

    ],

];