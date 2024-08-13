<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Sandbox
    |--------------------------------------------------------------------------
    |
    | Checa se utilizará o Sandbox ou Production.
    |
    */
    'sandbox' => env('ENVIRONMENT_SANDBOX', true),
    // 'sandbox' => false,

    /*
    |--------------------------------------------------------------------------
    | Email
    |--------------------------------------------------------------------------
    |
    | Conta de email do Vendedor.
    |
    */
    'email' => env('PAGSEGURO_EMAIL', ''),
    // 'email' => App\Integration::first()->email_pagseguro,
    /*
    |--------------------------------------------------------------------------
    | Token
    |--------------------------------------------------------------------------
    |
    | Token do Vendedor.
    |
    */
    'token' => env('PAGSEGURO_TOKEN', ''),
    // 'token' => App\Integration::first()->token_pagseguro,

    /*
    |--------------------------------------------------------------------------
    | NotificationURL
    |--------------------------------------------------------------------------
    |
    | URL de resposta para notificações do Pagseguro.
    |
    */
    'notificationURL' => env('PAGSEGURO_NOTIFICATION', ''),
    // 'notificationURL' => '/notification',

];
