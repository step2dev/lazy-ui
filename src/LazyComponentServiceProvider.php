<?php

namespace Lazyadm\LazyComponent;

use Lazyadm\LazyComponent\Commands\LazyComponentCommand;
use Lazyadm\LazyComponent\Components\Alert;
use Lazyadm\LazyComponent\Components\Badge;
use Lazyadm\LazyComponent\Components\Checkbox;
use Lazyadm\LazyComponent\Components\Divider;
use Lazyadm\LazyComponent\Components\Form\FormCheckbox;
use Lazyadm\LazyComponent\Components\Form\FormInput;
use Lazyadm\LazyComponent\Components\Form\FormToggle;
use Lazyadm\LazyComponent\Components\Input;
use Lazyadm\LazyComponent\Components\Label;
use Lazyadm\LazyComponent\Components\Native\NativeInput;
use Lazyadm\LazyComponent\Components\Toggle;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

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
            ->name('lazy')
            ->hasConfigFile('lazy-component')
            ->hasViews('lazy')
            ->hasTranslations()
            ->hasViewComponents('lazy',
                Alert::class,
                Badge::class,
                Checkbox::class,
                Divider::class,
                Input::class,
//                Dropdown::class,
                Label::class,
//                Radio::class,
//                Select::class,
                Toggle::class,

                // native
                NativeInput::class,

                // form
//                Form::class,
//                FormGroup::class,
                FormCheckbox::class,
                FormInput::class,
                FormToggle::class,

            )
//            ->hasAssets()
//            ->publishesServiceProvider($nameOfYourServiceProvider)
//            ->hasRoutes(['web', 'admin'])
//            ->hasMigration('create_lazy-component_table')
            ->hasCommand(LazyComponentCommand::class);
    }
}
