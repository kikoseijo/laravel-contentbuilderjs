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
            __DIR__ . '/config/content-builder-js.php' => base_path('config/content-builder-js.php')
                ], 'config');

        $this->publishes([
            __DIR__ . '/assets/' => base_path('public/vendor/content-builder-js')
                ], 'public');

        $this->loadViewsFrom(__DIR__ . '/resources/view', 'content-builder-js');
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
