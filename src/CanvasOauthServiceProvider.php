<?php

namespace smtech\OAuth2\Client;

use Illuminate\Support\ServiceProvider;
use smtech\OAuth2\Client\Provider\CanvasLMSOAuthProvider;

class CanvasOauthServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->publishes([
            __DIR__ . '/config.php' => config_path('canvas.php'),
        ]);

        $this->app->bind(CanvasLMSOAuthProvider::class, function () {
            return new CanvasLMSOAuthProvider([
                'clientId' => config('canvas.client_id'),
                'clientSecret' => config('canvas.client_secret'),
                'purpose' => config('canvas.purpose'),
                'redirectUri' => route(config('canvas.redirect_route')),
                'canvasInstanceUrl' => config('canvas.url'),
                'forceLogin' => config('canvas.force_login'),
                'scope' => config('canvas.scope'),
            ]);
        });
    }
}
