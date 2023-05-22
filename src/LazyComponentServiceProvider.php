<?php

namespace Lazyadm\LazyComponent;

use Lazyadm\LazyComponent\Commands\LazyComponentCommand;
use Lazyadm\LazyComponent\Components\Alert;
use Lazyadm\LazyComponent\Components\Avatar;
use Lazyadm\LazyComponent\Components\AvatarGroup;
use Lazyadm\LazyComponent\Components\Badge;
use Lazyadm\LazyComponent\Components\Btn;
use Lazyadm\LazyComponent\Components\Btn\BtnBack;
use Lazyadm\LazyComponent\Components\Btn\BtnDelete;
use Lazyadm\LazyComponent\Components\Btn\BtnLogout;
use Lazyadm\LazyComponent\Components\Checkbox;
use Lazyadm\LazyComponent\Components\Divider;
use Lazyadm\LazyComponent\Components\Form\FormCheckbox;
use Lazyadm\LazyComponent\Components\Form\FormInput;
use Lazyadm\LazyComponent\Components\Form\FormToggle;
use Lazyadm\LazyComponent\Components\Input;
use Lazyadm\LazyComponent\Components\Label;
use Lazyadm\LazyComponent\Components\Link;
use Lazyadm\LazyComponent\Components\Radial;
use Lazyadm\LazyComponent\Components\Radio;
use Lazyadm\LazyComponent\Components\Range;
use Lazyadm\LazyComponent\Components\Stack;
use Lazyadm\LazyComponent\Components\Textarea;
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
                Avatar::class,
                AvatarGroup::class,
                Badge::class,
                // button
                Btn::class,
                BtnBack::class,
                //                BtnGroup::class,
                BtnDelete::class,
                BtnLogout::class,
                // end button
                Checkbox::class,
                Divider::class,
                //                Dropdown::class,
                Input::class,
                Label::class,
                Link::class,
                Radio::class,
                Range::class,
                //                Select::class,
                Stack::class,
                Textarea::class,
                Toggle::class,
                Radial::class,
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
