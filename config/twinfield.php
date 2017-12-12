<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Auth type
    |--------------------------------------------------------------------------
    |
    | The authentication type to use when connecting to the Twinfield web
    | service.
    |
    | Available types: "credentials", "oauth"
    |
    */

    'authType' => env('TWINFIELD_AUTH_TYPE', 'credentials'),

    /*
    |--------------------------------------------------------------------------
    | Username
    |--------------------------------------------------------------------------
    |
    | Your Twinfield username.
    |
    */

    'username' => env('TWINFIELD_USERNAME'),

    /*
    |--------------------------------------------------------------------------
    | Password
    |--------------------------------------------------------------------------
    |
    | Your Twinfield password.
    |
    */

    'password' => env('TWINFIELD_PASSWORD'),

    /*
    |--------------------------------------------------------------------------
    | Organization
    |--------------------------------------------------------------------------
    |
    | Your Twinfield organisation.
    |
    */

    'organisation' => env('TWINFIELD_ORGANISATION'),

    /*
    |--------------------------------------------------------------------------
    | Office
    |--------------------------------------------------------------------------
    |
    | Your Twinfield office.
    |
    */

    'office' => env('TWINFIELD_OFFICE'),

    /*
    |--------------------------------------------------------------------------
    | OAuth Client ID
    |--------------------------------------------------------------------------
    |
    | Your Twinfield OAuth Client ID, used when "authType" is "oauth".
    |
    */

    'clientId' => env('TWINFIELD_CLIENT_ID'),

    /*
    |--------------------------------------------------------------------------
    | OAuth Client Secret
    |--------------------------------------------------------------------------
    |
    | Your Twinfield OAuth Client Secret, used when "authType" is "oauth".
    |
    */

    'clientSecret' => env('TWINFIELD_CLIENT_SECRET'),

    /*
    |--------------------------------------------------------------------------
    | OAuth Return URL
    |--------------------------------------------------------------------------
    |
    | The OAuth return URL, used when "authType" is "oauth".
    |
    */

    'returnUrl' => env('TWINFIELD_RETURN_URL'),

    /*
    |--------------------------------------------------------------------------
    | OAuth Auto Redirect
    |--------------------------------------------------------------------------
    |
    | Automatically redirect to Twinfield to login, used when "authType" is
    | "oauth".
    |
    */

    'autoRedirect' => false,

];
