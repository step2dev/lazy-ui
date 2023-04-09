<?php

namespace Lazyadm\LazyComponent\Providers;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class LazyFormServiceProvider extends ServiceProvider
{
    private string $packageName = 'lazy-admin';

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(__DIR__.'/../config/lazy-component.php', 'lazy-form');
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        if ($this->app->runningInConsole()) {
        }

        $this->publishes([
            __DIR__.'/../config/lazy-component.php' => config_path('lazy/form.php'),
        ], 'lazy-admin');

        $this->loadViewsFrom(__DIR__.'/../resources/views', 'lazy');

        Blade::componentNamespace('App\View\Components\Admin', 'lazy');

        collect(config('lazy-admin.components', []))->each(fn ($class, $alias) => Blade::component('lazy::'.$alias,
            $class));
    }
}
