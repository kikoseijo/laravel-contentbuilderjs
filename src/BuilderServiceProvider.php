<?php

namespace Ksoft\ContentBuilderJs;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Route;
use Illuminate\Contracts\Routing\Registrar as Router;

class BuilderServiceProvider extends ServiceProvider {

    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot() {
        $this->publishes([
            __DIR__ . '/config/content-builder-js.php' => config_path('content-builder-js.php')
        ], 'config');

        $this->publishes([
            __DIR__ . '/assets/' => base_path('public/vendor/content-builder-js')
        ], 'public');

        $this->loadViewsFrom(__DIR__ . '/resources/view', 'content-builder-js');
        $this->publishes([
               __DIR__.'/resources/view' => resource_path('views/vendor/content-builder-js'),
        ], 'views');

        $this->loadRoutesFrom(__DIR__.'/routes.php');

        $this->loadMigrationsFrom(__DIR__.'/migrations');

    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register() {
        //$this->loadRoutesFrom(__DIR__.'/routes.php');
    }

    /**
     * Binds the Passport routes into the controller.
     *
     * @param  callable|null  $callback
     * @param  array  $options
     * @return void
     */
    public static function routes($callback = null, array $options = [])
    {
        $callback = $callback ?: function ($router) {
            $router->all();
        };

        $defaultOptions = [
            'prefix' => 'cbld',
            'namespace' => '\Ksoft\ContentBuilderJs\Controllers',
        ];

        $options = array_merge($defaultOptions, $options);

        Route::group($options, function ($router) use ($callback) {
            $callback(new RouteRegistrar($router));
        });
    }

}
