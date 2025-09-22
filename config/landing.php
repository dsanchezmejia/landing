<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Landing Login URL
    |--------------------------------------------------------------------------
    |
    | This value is the URL where users will be redirected for login.
    | You can set this in your .env file using LANDING_LOGIN_URL.
    |
    */

    'login_url' => env('LANDING_LOGIN_URL', '/login'),

    /*
    |--------------------------------------------------------------------------
    | Landing Assets
    |--------------------------------------------------------------------------
    |
    | Configuration for compiled assets location.
    |
    */

    'assets' => [
        'css' => '/vendor/landing/css/app.css',
        'js' => '/vendor/landing/js/app.js',
    ],
];
