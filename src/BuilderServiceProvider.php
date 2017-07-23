<?php

namespace Ksoft\ContentBuilderJs;
use Illuminate\Support\ServiceProvider;

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
//
    }

}
