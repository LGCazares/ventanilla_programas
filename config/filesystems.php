<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Default Filesystem Disk
    |--------------------------------------------------------------------------
    |
    | Here you may specify the default filesystem disk that should be used
    | by the framework. The "local" disk, as well as a variety of cloud
    | based disks are available to your application for file storage.
    |
    */

    'default' => env('FILESYSTEM_DISK_ESTANCIA_TURISTICA', 'local'),

    /*
    |--------------------------------------------------------------------------
    | Filesystem Disks
    |--------------------------------------------------------------------------
    |
    | Below you may configure as many filesystem disks as necessary, and you
    | may even configure multiple disks for the same driver. Examples for
    | most supported storage drivers are configured here for reference.
    |
    | Supported drivers: "local", "ftp", "sftp", "s3"
    |
    */

    'disks' => [

        'local' => [
            'driver' => 'local',
            'root' => storage_path('app'),
            'throw' => false,
            'permissions' => [
                'file' => [
                'public' => 0664,
                'private' => 0600,
                ],
                'dir' => [
                'public' => 0775,
                'private' => 0700,
                ],
            ],
        ],

        'public' => [
            'driver' => 'local',
            'root' => storage_path('app/public'),
            'url' => env('APP_URL_ESTANCIA_TURISTICA').'/storage',
            'visibility' => 'public',
            'throw' => false,
        ],

        's3' => [
            'driver' => 's3',
            'key' => env('AWS_ACCESS_KEY_ID_ESTANCIA_TURISTICA'),
            'secret' => env('AWS_SECRET_ACCESS_KEY_ESTANCIA_TURISTICA'),
            'region' => env('AWS_DEFAULT_REGION_ESTANCIA_TURISTICA'),
            'bucket' => env('AWS_BUCKET_ESTANCIA_TURISTICA'),
            'url' => env('AWS_URL_ESTANCIA_TURISTICA'),
            'endpoint' => env('AWS_ENDPOINT:ESTANCIA_TURISTICA'),
            'use_path_style_endpoint' => env('AWS_USE_PATH_STYLE_ENDPOINT_ESTANCIA_TURISTICA', false),
            'throw' => false,
        ],

    ],

    /*
    |--------------------------------------------------------------------------
    | Symbolic Links
    |--------------------------------------------------------------------------
    |
    | Here you may configure the symbolic links that will be created when the
    | `storage:link` Artisan command is executed. The array keys should be
    | the locations of the links and the values should be their targets.
    |
    */

    'links' => [
        public_path('storage') => storage_path('app/public'),
    ],

];
