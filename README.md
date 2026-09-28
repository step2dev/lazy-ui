# LazyUI [![License: MIT](https://img.shields.io/github/license/step2dev/lazy-ui?style=flat-square)](LICENSE.md) [![Contributors](https://img.shields.io/github/contributors/step2dev/lazy-ui.svg?style=flat-square)](https://github.com/step2dev/lazy-ui/graphs/contributors) ![Packagist PHP Version](https://img.shields.io/packagist/dependency-v/step2dev/lazy-ui/php) ![Packagist Laravel Version](https://img.shields.io/packagist/dependency-v/step2dev/lazy-ui/illuminate/contracts)


[![Latest Version on Packagist](https://img.shields.io/packagist/v/step2dev/lazy-ui.svg?style=flat-square)](https://packagist.org/packages/step2dev/lazy-ui)
[![GitHub Tests Action Status](https://img.shields.io/github/actions/workflow/status/step2dev/lazy-ui/run-tests.yml?branch=main&label=tests&style=flat-square)](https://github.com/step2dev/lazy-ui/actions?query=workflow%3Arun-tests+branch%3Amain)
[![GitHub Code Style Action Status](https://img.shields.io/github/actions/workflow/status/step2dev/lazy-ui/fix-php-code-style-issues.yml?branch=main&label=code%20style&style=flat-square)](https://github.com/step2dev/lazy-ui/actions?query=workflow%3A"Fix+PHP+code+style+issues"+branch%3Amain)
[![PHPStan](https://github.com/step2dev/lazy-ui/actions/workflows/phpstan.yml/badge.svg)](https://github.com/step2dev/lazy-ui/actions/workflows/phpstan.yml)
[![Total Downloads](https://img.shields.io/packagist/dt/step2dev/lazy-ui.svg?style=flat-square)](https://packagist.org/packages/step2dev/lazy-ui)

This is where your description should go. Limit it to a paragraph or two. Consider adding a small example.

## 2.x frontend stack

Lazy UI 2.x supports Laravel 12 and 13 and uses:

- Tailwind CSS 4
- daisyUI 5
- Alpine.js 3
- Quill 2

The maintained 1.x line remains on Tailwind CSS 3 and daisyUI 4.

Upgrading from Lazy UI 1.x? See the [1.x → 2.x migration guide](docs/upgrade-1-to-2.md).

## Support us

[Support us](https://github.com/sponsors/Step2dev) with a monthly donation and help us continue our activities.

## Installation

You can install the package via composer:

```bash
composer require step2dev/lazy-ui
```

Install the Lazy UI frontend dependencies and Tailwind CSS 4 configuration:

```bash
php artisan lazy-ui:install-package
```

The installer creates `resources/css/lazy.css`, `resources/js/lazy.js`, and `postcss.config.js`.

You can publish the config file with:

```bash
php artisan vendor:publish --tag="lazy-ui-config"
```

Optionally, you can publish the views using

```bash
php artisan vendor:publish --tag="lazy-ui-views"
```

## Testing

```bash
composer test
```

## 📁 List of components

Lazy UI 2.x provides wrappers for all current daisyUI 5 component families while keeping daisyUI class names internal to the package.

<details>
<summary>
  show / hide
</summary>

- Actions
    - [x] Button
    - [x] Dropdown
    - [x] FAB / Speed Dial
    - [x] Modal
    - [x] Swap
    - [x] Theme Controller

- Data display
    - [x] Accordion
    - [x] Avatar
    - [x] Aura
    - [x] Badge
    - [x] Card
    - [x] Carousel
    - [x] Chat bubble
    - [x] Collapse
    - [x] Countdown
    - [x] Diff
    - [x] Hover 3D
    - [x] Hover Gallery
    - [x] Kbd
    - [x] List
    - [x] Stat
    - [x] Status
    - [x] Table
    - [x] Text Rotate
    - [x] Timeline

- Navigation
    - [x] Breadcrumbs
    - [x] Dock
    - [x] Link
    - [x] Megamenu
    - [x] Menu
    - [x] Navbar
    - [x] Pagination
    - [x] Steps
    - [x] Tabs

- Feedback
    - [x] Alert
    - [x] Loading
    - [x] Progress
    - [x] Radial progress
    - [x] Skeleton
    - [x] Toast
    - [x] Tooltip

- Data input
    - [x] Calendar
    - [x] Checkbox
    - [x] Fieldset
    - [x] File Input
    - [x] Filter
    - [x] Label
    - [x] Radio
    - [x] Range
    - [x] Rating
    - [x] Select
    - [x] Text Input
    - [x] Textarea
    - [x] Toggle
    - [x] Validator
    - [x] OTP

- Layout
    - [x] Divider
    - [x] Drawer
    - [x] Footer
    - [x] Hero
    - [x] Indicator
    - [x] Join
    - [x] Mask
    - [x] Stack

- Mockup
    - [x] Browser
    - [x] Code
    - [x] Phone
    - [x] Window

### Legacy compatibility

- [x] Button Group → Join
- [x] `danger` → daisyUI `error`
- [x] `boxed` / `lifted` / `bordered` tab API → daisyUI 5 tab classes
- [x] Legacy square/parallelogram masks retained by Lazy UI compatibility CSS

</details>

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

## Security Vulnerabilities

Please review [our security policy](../../security/policy) on how to report security vulnerabilities.

## Credits

- [CrazyBoy49z](https://github.com/CrazyBoy49z)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
