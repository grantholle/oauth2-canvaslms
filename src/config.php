<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Purpose
    |--------------------------------------------------------------------------
    |
    | You may optionally provide a purpose parameter that will be sent to Canvas.
    | You can read more about it in the documentation:
    | https://canvas.instructure.com/doc/api/file.oauth_endpoints.html
    |
    */

    'purpose' => env('CANVAS_PURPOSE', 'Web instance'),

    /*
    |--------------------------------------------------------------------------
    | Client ID and Secret
    |--------------------------------------------------------------------------
    |
    | Here you provide the client ID and secret that were provided in
    | the Canvas admin area under Developer Keys. These are generated
    | by Canvas automatically. They are regarded as passwords so keep
    | the secure!
    |
    */

    'client_id' => env('CANVAS_CLIENT_ID'),

    'client_secret' => env('CANVAS_SECRET'),

    /*
    |--------------------------------------------------------------------------
    | Canvas Instance URL
    |--------------------------------------------------------------------------
    |
    | This is where you'll configure the URL of your Canvas instance.
    | It should be the full URL, including the protocol
    | For example, https://tenant.instructure.com.
    |
    */

    'url' => env('CANVAS_INSTANCE_URL'),

    /*
    |--------------------------------------------------------------------------
    | Canvas Redirect Route
    |--------------------------------------------------------------------------
    |
    | This is the route name that Canvas will redirect the user
    | to after successful authorization of your app. It should
    | exists in your web.php file with the matching name.
    |
    */

    'redirect_route' => env('CANVAS_REDIRECT_ROUTE', 'canvas.login.verify'),

    /*
    |--------------------------------------------------------------------------
    | Force Login
    |--------------------------------------------------------------------------
    |
    | This is the route name that Canvas will redirect the user
    | to after successful authorization of your app. It should
    | exists in your web.php file with the matching name.
    |
    */

    'force_login' => env('CANVAS_FORCE_LOGIN', false),

    /*
    |--------------------------------------------------------------------------
    | Scopes
    |--------------------------------------------------------------------------
    |
    | If your developer key is implementing scopes (recommended)
    | define those scopes here.
    |
    */

    'scope' => [],
];
