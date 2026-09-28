<?php

namespace Step2dev\LazyUI;

use Illuminate\Support\Facades\Blade;
use Livewire\Component;
use Spatie\LaravelPackageTools\Commands\InstallCommand;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;
use Step2dev\LazyUI\Commands\LazyInstallCommand;
use Step2dev\LazyUI\Components\Accordion;
use Step2dev\LazyUI\Components\Alert;
use Step2dev\LazyUI\Components\Aura;
use Step2dev\LazyUI\Components\Avatar;
use Step2dev\LazyUI\Components\AvatarGroup;
use Step2dev\LazyUI\Components\Badge;
use Step2dev\LazyUI\Components\Breadcrumbs;
use Step2dev\LazyUI\Components\Btn;
use Step2dev\LazyUI\Components\BtnGroup;
use Step2dev\LazyUI\Components\Buttons\BtnBack;
use Step2dev\LazyUI\Components\Buttons\BtnDelete;
use Step2dev\LazyUI\Components\Buttons\BtnLogout;
use Step2dev\LazyUI\Components\Calendar;
use Step2dev\LazyUI\Components\Card;
use Step2dev\LazyUI\Components\Carousel;
use Step2dev\LazyUI\Components\CarouselItem;
use Step2dev\LazyUI\Components\Chat;
use Step2dev\LazyUI\Components\Checkbox;
use Step2dev\LazyUI\Components\Choices;
use Step2dev\LazyUI\Components\Collapse;
use Step2dev\LazyUI\Components\Countdown;
use Step2dev\LazyUI\Components\DataList;
use Step2dev\LazyUI\Components\Diff;
use Step2dev\LazyUI\Components\Divider;
use Step2dev\LazyUI\Components\Dock;
use Step2dev\LazyUI\Components\DockItem;
use Step2dev\LazyUI\Components\Drawer;
use Step2dev\LazyUI\Components\Dropdown;
use Step2dev\LazyUI\Components\Error;
use Step2dev\LazyUI\Components\Fab;
use Step2dev\LazyUI\Components\Fieldset;
use Step2dev\LazyUI\Components\FileInput;
use Step2dev\LazyUI\Components\Filter;
use Step2dev\LazyUI\Components\Footer;
use Step2dev\LazyUI\Components\Form;
use Step2dev\LazyUI\Components\Form\FormCheckbox;
use Step2dev\LazyUI\Components\Form\FormImage;
use Step2dev\LazyUI\Components\Form\FormInput;
use Step2dev\LazyUI\Components\Form\FormRichtext;
use Step2dev\LazyUI\Components\Form\FormSelect;
use Step2dev\LazyUI\Components\Form\FormTextarea;
use Step2dev\LazyUI\Components\Form\FormToggle;
use Step2dev\LazyUI\Components\FormGroup;
use Step2dev\LazyUI\Components\Hero;
use Step2dev\LazyUI\Components\Hover3d;
use Step2dev\LazyUI\Components\HoverGallery;
use Step2dev\LazyUI\Components\Image;
use Step2dev\LazyUI\Components\Indicator;
use Step2dev\LazyUI\Components\Input;
use Step2dev\LazyUI\Components\InputGroup;
use Step2dev\LazyUI\Components\Join;
use Step2dev\LazyUI\Components\Kbd;
use Step2dev\LazyUI\Components\Label;
use Step2dev\LazyUI\Components\Link;
use Step2dev\LazyUI\Components\ListRow;
use Step2dev\LazyUI\Components\Loading;
use Step2dev\LazyUI\Components\Mask;
use Step2dev\LazyUI\Components\Megamenu;
use Step2dev\LazyUI\Components\Menu;
use Step2dev\LazyUI\Components\MenuList;
use Step2dev\LazyUI\Components\Mockup\MockupBrowser;
use Step2dev\LazyUI\Components\Mockup\MockupCode;
use Step2dev\LazyUI\Components\Mockup\MockupPhone;
use Step2dev\LazyUI\Components\Mockup\MockupWindow;
use Step2dev\LazyUI\Components\Modal;
use Step2dev\LazyUI\Components\Navbar;
use Step2dev\LazyUI\Components\Otp;
use Step2dev\LazyUI\Components\Pagination;
use Step2dev\LazyUI\Components\PaginationItem;
use Step2dev\LazyUI\Components\Progress;
use Step2dev\LazyUI\Components\Radial;
use Step2dev\LazyUI\Components\Radio;
use Step2dev\LazyUI\Components\Range;
use Step2dev\LazyUI\Components\Rating;
use Step2dev\LazyUI\Components\Richtext;
use Step2dev\LazyUI\Components\Select;
use Step2dev\LazyUI\Components\Skeleton;
use Step2dev\LazyUI\Components\Stack;
use Step2dev\LazyUI\Components\Stat;
use Step2dev\LazyUI\Components\Stats;
use Step2dev\LazyUI\Components\Status;
use Step2dev\LazyUI\Components\Step;
use Step2dev\LazyUI\Components\Steps;
use Step2dev\LazyUI\Components\Swap;
use Step2dev\LazyUI\Components\Tab;
use Step2dev\LazyUI\Components\Table;
use Step2dev\LazyUI\Components\Tabs;
use Step2dev\LazyUI\Components\Textarea;
use Step2dev\LazyUI\Components\TextRotate;
use Step2dev\LazyUI\Components\ThemeController;
use Step2dev\LazyUI\Components\ThemeSwitcher;
use Step2dev\LazyUI\Components\Timeline;
use Step2dev\LazyUI\Components\TimelineItem;
use Step2dev\LazyUI\Components\Toast;
use Step2dev\LazyUI\Components\Toggle;
use Step2dev\LazyUI\Components\Tooltip;
use Step2dev\LazyUI\Components\Widgets\CountryTimeWidget;

class LazyUiServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        $package
            ->name('lazy-ui')
            ->hasViews('lazy')
            ->hasTranslations()
            ->hasConfigFile(['lazy/themes'])
            ->hasViewComponents('lazy',
                Accordion::class,
                Alert::class,
                Aura::class,
                Avatar::class,
                AvatarGroup::class,
                Badge::class,
                Breadcrumbs::class,
                Btn::class,
                BtnBack::class,
                BtnDelete::class,
                BtnGroup::class,
                BtnLogout::class,
                Calendar::class,
                Card::class,
                Carousel::class,
                CarouselItem::class,
                Chat::class,
                Checkbox::class,
                Choices::class,
                Collapse::class,
                Countdown::class,
                DataList::class,
                Diff::class,
                Divider::class,
                Dock::class,
                DockItem::class,
                Drawer::class,
                Dropdown::class,
                Error::class,
                Fab::class,
                Fieldset::class,
                FileInput::class,
                Filter::class,
                Footer::class,
                Form::class,
                FormCheckbox::class,
                FormGroup::class,
                FormImage::class,
                FormInput::class,
                FormRichtext::class,
                FormSelect::class,
                FormTextarea::class,
                FormToggle::class,
                Hero::class,
                Hover3d::class,
                HoverGallery::class,
                Image::class,
                Indicator::class,
                Input::class,
                InputGroup::class,
                Join::class,
                Kbd::class,
                Label::class,
                Link::class,
                ListRow::class,
                Loading::class,
                Mask::class,
                Megamenu::class,
                Menu::class,
                MenuList::class,
                MockupBrowser::class,
                MockupCode::class,
                MockupPhone::class,
                MockupWindow::class,
                Modal::class,
                Navbar::class,
                Otp::class,
                Pagination::class,
                PaginationItem::class,
                Progress::class,
                Radial::class,
                Radio::class,
                Range::class,
                Rating::class,
                Richtext::class,
                Select::class,
                Skeleton::class,
                Stack::class,
                Stat::class,
                Stats::class,
                Status::class,
                Step::class,
                Steps::class,
                Swap::class,
                Tab::class,
                Table::class,
                Tabs::class,
                Textarea::class,
                TextRotate::class,
                ThemeController::class,
                ThemeSwitcher::class,
                Timeline::class,
                TimelineItem::class,
                Toast::class,
                Toggle::class,
                Tooltip::class,
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

    public function packageBooted(): void
    {
        Blade::component(Hover3d::class, 'lazy-hover-3d');
        Blade::component(DataList::class, 'lazy-list');
    }
}
