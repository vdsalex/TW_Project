<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Stripe, Mailgun, SparkPost and others. This file provides a sane
    | default location for this type of information, allowing packages
    | to have a conventional place to find your various credentials.
    |
    */

    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
    ],

    'ses' => [
        'key' => env('SES_KEY'),
        'secret' => env('SES_SECRET'),
        'region' => 'us-east-1',
    ],

    'sparkpost' => [
        'secret' => env('SPARKPOST_SECRET'),
    ],

    'stripe' => [
        'model' => App\User::class,
        'key' => env('STRIPE_KEY'),
        'secret' => env('STRIPE_SECRET'),
    ],
    
    'facebook' => [
    'client_id' => '2288280108064862',
    'client_secret' => 'a7a0e7fb31591cde1f0dc91290098be7',
    'redirect' => 'http://localhost:8000/auth/facebook/callback',
    ],
    
    'google' => [
    'client_id' => '544747441154-op8uhkb5h23m8r9oom1hbi59m4fgm4fg.apps.googleusercontent.com',
    'client_secret' => 'ubt1kO6Zbio5JphSqTUf5zxI',
    'redirect' => 'http://localhost:8000/auth/google/callback',
    ],

];
