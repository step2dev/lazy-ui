<?php

namespace Lazyadm\LazyComponent;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;
use Lazyadm\LazyComponent\Commands\LazyComponentCommand;

class LazyComponentServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        /*
         * This class is a Package Service Provider
         *
         * More info: https://github.com/spatie/laravel-package-tools
         */
        $package
            ->name('lazy-component')
            ->hasConfigFile()
            ->hasViews()
            ->hasMigration('create_lazy-component_table')
            ->hasCommand(LazyComponentCommand::class);
    }
}
