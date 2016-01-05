<?php

namespace Canducci\ReCaptcha\Providers;

use Illuminate\Support\ServiceProvider;

class ReCaptchaServiceProvider extends ServiceProvider
{

    /**
     * ReCaptchaServiceProvider constructor.
     */
    public function __construct()
    {

    }

    /**
     * Boot
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([
            __DIR__ . '/../../Config/recaptcha.php' => config_path('recaptcha.php'),
            __DIR__.'/../../Request/ReCaptchaRequest.php' => app_path('/Http/Requests/ReCaptchaRequest.php')
        ]);
        /*
        $this->mergeConfigFrom(
            __DIR__ . '/../config/recaptcha.php', 'recaptcha'
        );*/
        $this->mergeConfigFrom(config_path('recaptcha.php'), 'recaptcha');
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {

    }
}