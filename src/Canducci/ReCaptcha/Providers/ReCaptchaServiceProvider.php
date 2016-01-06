<?php

namespace Canducci\ReCaptcha\Providers;

use Canducci\ReCaptcha\ReCaptcha;
use Illuminate\Support\ServiceProvider;
use Illuminate\View\Compilers\BladeCompiler;

class ReCaptchaServiceProvider extends ServiceProvider
{

    protected $defer = false;

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

        $this->validation();
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->load();
        $this->blade();
    }

    /**
     * Load Class Instance
     *
     * @return void
     *
     */
    private function load()
    {
        $this->app->singleton('recaptcha', function()
        {
            return new ReCaptcha();
        });

        $this->app->bind('Canducci\ReCaptcha\ReCaptcha', 'recaptcha');
    }

    /**
     * Render Validation
     *
     * @return void
     *
     */
    private function validation()
    {
        $validator = $this->app->make('validator');
        $validator->extend('recaptchavalidation', 'Canducci\ReCaptcha\ReCaptchaValidation@validate', 'Error');
    }

    /**
     * Render Blade
     *
     * @return void
     *
     */
    private function blade()
    {

        $this->app->afterResolving('blade.compiler', function (BladeCompiler $blade) {

            if (str_contains($this->app->version(), '5.0'))
            {

                $blade->extend(function ($view, $compiler) {

                    $pattern = $compiler->createMatcher('recaptchascript');

                    return preg_replace($pattern, "$1<?php echo app('recaptcha')->script$2; ?>", $view);

                });

                $blade->extend(function ($view, $compiler) {

                    $pattern = $compiler->createMatcher('recaptcha');

                    return preg_replace($pattern, "$1<?php echo app('recaptcha')->render$2; ?>", $view);

                });

            }
            else
            {
                $blade->directive('recaptchascript', function ($expression) {

                    return "<?php echo app('recaptcha')->script{$expression}; ?>";

                });

                $blade->directive('recaptcha', function ($expression) {

                    return "<?php echo app('recaptcha')->render{$expression}; ?>";

                });

            }
        });

    }
}