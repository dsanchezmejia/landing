<?php

namespace Timeio\Landing;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Route;

class LandingServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->mergeConfigFrom(
            __DIR__.'/../config/landing.php', 'landing'
        );
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        $this->loadRoutes();
        $this->loadViews();
        $this->publishConfig();
        $this->publishAssets();
    }

    /**
     * Load the package routes.
     */
    protected function loadRoutes(): void
    {
        if (file_exists($routesPath = __DIR__.'/../routes/web.php')) {
            Route::middleware('web')
                ->group($routesPath);
        }
    }

    /**
     * Load the package views.
     */
    protected function loadViews(): void
    {
        $this->loadViewsFrom(__DIR__.'/../resources/views', 'landing');
    }

    /**
     * Publish the configuration file.
     */
    protected function publishConfig(): void
    {
        $this->publishes([
            __DIR__.'/../config/landing.php' => config_path('landing.php'),
        ], 'landing-config');
    }

    /**
     * Publish the compiled assets.
     */
    protected function publishAssets(): void
    {
        $this->publishes([
            __DIR__.'/../public' => public_path('vendor/landing'),
        ], 'landing-assets');
    }
}
