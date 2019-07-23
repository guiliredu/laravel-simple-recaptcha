<?php

namespace Guiliredu\LaravelSimpleRecaptcha;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\ServiceProvider;

class RecaptchaServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     */
    public function boot()
    {
        // Translations
        $this->loadTranslationsFrom(__DIR__.'/../resources/lang', 'recaptcha');

        // Views
        $this->loadViewsFrom(__DIR__.'/../resources/views', 'recaptcha');

        // Configuration
        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__.'/../config/config.php' => config_path('recaptcha.php'),
            ], 'config');
        }

        // Custom Validator
        Validator::extend('recaptcha', 'Guiliredu\LaravelSimpleRecaptcha\RecaptchaValidator@validate');
    }

    /**
     * Register the application services.
     */
    public function register()
    {
        // Automatically apply the package configuration
        $this->mergeConfigFrom(__DIR__.'/../config/config.php', 'recaptcha');

        // Register the main class to use with the facade
        $this->app->singleton('recaptcha', function () {
            return new Recaptcha;
        });
    }
}
