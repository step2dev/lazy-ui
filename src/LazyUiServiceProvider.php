<?php

namespace Step2dev\LazyUI;

use Livewire\Component;
use Spatie\LaravelPackageTools\Commands\InstallCommand;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;
use Step2dev\LazyUI\Commands\LazyInstallCommand;
use Step2dev\LazyUI\Components\Accordion;
use Step2dev\LazyUI\Components\Alert;
use Step2dev\LazyUI\Components\Avatar;
use Step2dev\LazyUI\Components\AvatarGroup;
use Step2dev\LazyUI\Components\Badge;
use Step2dev\LazyUI\Components\Breadcrumbs;
use Step2dev\LazyUI\Components\Btn;
use Step2dev\LazyUI\Components\BtnGroup;
use Step2dev\LazyUI\Components\Buttons\BtnBack;
use Step2dev\LazyUI\Components\Buttons\BtnDelete;
use Step2dev\LazyUI\Components\Buttons\BtnLogout;
use Step2dev\LazyUI\Components\Chat;
use Step2dev\LazyUI\Components\Checkbox;
use Step2dev\LazyUI\Components\Choices;
use Step2dev\LazyUI\Components\Countdown;
use Step2dev\LazyUI\Components\Divider;
use Step2dev\LazyUI\Components\Error;
use Step2dev\LazyUI\Components\Form;
use Step2dev\LazyUI\Components\Form\FormCheckbox;
use Step2dev\LazyUI\Components\Form\FormImage;
use Step2dev\LazyUI\Components\Form\FormInput;
use Step2dev\LazyUI\Components\Form\FormRichtext;
use Step2dev\LazyUI\Components\Form\FormSelect;
use Step2dev\LazyUI\Components\Form\FormTextarea;
use Step2dev\LazyUI\Components\Form\FormToggle;
use Step2dev\LazyUI\Components\FormGroup;
use Step2dev\LazyUI\Components\Image;
use Step2dev\LazyUI\Components\Input;
use Step2dev\LazyUI\Components\Join;
use Step2dev\LazyUI\Components\Kbd;
use Step2dev\LazyUI\Components\Label;
use Step2dev\LazyUI\Components\Link;
use Step2dev\LazyUI\Components\Loading;
use Step2dev\LazyUI\Components\Menu;
use Step2dev\LazyUI\Components\Mockup\MockupBrowser;
use Step2dev\LazyUI\Components\Mockup\MockupCode;
use Step2dev\LazyUI\Components\Mockup\MockupPhone;
use Step2dev\LazyUI\Components\Mockup\MockupWindow;
use Step2dev\LazyUI\Components\Radial;
use Step2dev\LazyUI\Components\Radio;
use Step2dev\LazyUI\Components\Range;
use Step2dev\LazyUI\Components\Rating;
use Step2dev\LazyUI\Components\Richtext;
use Step2dev\LazyUI\Components\Select;
use Step2dev\LazyUI\Components\Stack;
use Step2dev\LazyUI\Components\Tab;
use Step2dev\LazyUI\Components\Tabs;
use Step2dev\LazyUI\Components\Textarea;
use Step2dev\LazyUI\Components\ThemeSwitcher;
use Step2dev\LazyUI\Components\Toast;
use Step2dev\LazyUI\Components\Toggle;
use Step2dev\LazyUI\Components\Tooltip;
use Step2dev\LazyUI\Components\Widgets\CountryTimeWidget;

class LazyUiServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        /*
         * This class is a Package Service Provider
         *
         * More info: https://github.com/spatie/laravel-package-tools
         */
        $package
            ->name('lazy-ui')
            ->hasViews('lazy')
            ->hasTranslations()
            ->hasConfigFile(['lazy/themes'])
            ->hasViewComponents('lazy',
                //                Dropdown::class,
                //Carousel::class,
                Accordion::class,
                Alert::class,
                Avatar::class,
                AvatarGroup::class,
                Badge::class,
                Breadcrumbs::class,
                Btn::class,
                BtnBack::class,
                BtnDelete::class,
                BtnGroup::class,
                BtnLogout::class,
                Chat::class,
                Checkbox::class,
                Countdown::class,
                Choices::class,
                Divider::class,
                Error::class,
                Form::class,
                FormCheckbox::class,
                FormGroup::class,
                FormImage::class,
                FormInput::class,
                FormRichtext::class,
                FormSelect::class,
                FormTextarea::class,
                FormToggle::class,
                Image::class,
                Input::class,
                Join::class,
                Kbd::class,
                Label::class,
                Link::class,
                Loading::class,
                Menu::class,
                MockupBrowser::class,
                MockupCode::class,
                MockupPhone::class,
                MockupWindow::class,
                Radial::class,
                Radio::class,
                Range::class,
                Rating::class,
                RichText::class,
                Select::class,
                Stack::class,
                Tab::class,
                Tabs::class,
                Textarea::class,
                ThemeSwitcher::class,
                Toast::class,
                Toggle::class,
                Tooltip::class,
                // widgets
                CountryTimeWidget::class,
            )
            ->hasCommand(LazyInstallCommand::class)
            ->hasInstallCommand(static function (InstallCommand $command) {
                $command
                    ->startWith(static function (InstallCommand $installCommand) {
                        $installCommand->info('Installing Lazy Ui...');
                        $installCommand->call('lazy-ui:install-package');
                    })
                    ->publishConfigFile()
                    ->askToStarRepoOnGitHub('step2dev/lazy-ui')
                    ->endWith(static function (InstallCommand $installCommand) {
                        $installCommand->info('Lazy Ui installed successfully. Enjoy!');
                    });
            });
    }

    public function packageRegistered(): void
    {
        Component::macro('notify', function (string $type = 'success', string $message = '', string $title = '') {
            $this->dispatch('notify', compact('message', 'title', 'type'));
        });

        Component::macro('notifyFlash', function (string $type = 'success', string $message = '', string $title = '') {
            session()->flash('notify-flash', compact('message', 'title', 'type'));
        });
    }
}
