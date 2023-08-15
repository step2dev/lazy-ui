# This is my package lazy-component

[![Latest Version on Packagist](https://img.shields.io/packagist/v/lazy-adm/lazy-component.svg?style=flat-square)](https://packagist.org/packages/lazy-adm/lazy-component)
[![GitHub Tests Action Status](https://img.shields.io/github/actions/workflow/status/lazy-adm/lazy-component/run-tests.yml?branch=main&label=tests&style=flat-square)](https://github.com/lazy-adm/lazy-component/actions?query=workflow%3Arun-tests+branch%3Amain)
[![GitHub Code Style Action Status](https://img.shields.io/github/actions/workflow/status/lazy-adm/lazy-component/fix-php-code-style-issues.yml?branch=main&label=code%20style&style=flat-square)](https://github.com/lazy-adm/lazy-component/actions?query=workflow%3A"Fix+PHP+code+style+issues"+branch%3Amain)
[![PHPStan](https://github.com/lazy-adm/lazy-component/actions/workflows/phpstan.yml/badge.svg)](https://github.com/lazy-adm/lazy-component/actions/workflows/phpstan.yml)
[![Total Downloads](https://img.shields.io/packagist/dt/lazy-adm/lazy-component.svg?style=flat-square)](https://packagist.org/packages/lazy-adm/lazy-component)

This is where your description should go. Limit it to a paragraph or two. Consider adding a small example.

## Support us

[<img src="https://github-ads.s3.eu-central-1.amazonaws.com/lazy-component.jpg?t=1" width="419px" />](https://spatie.be/github-ad-click/lazy-component)

We invest a lot of resources into creating [best in class open source packages](https://spatie.be/open-source). You can support us by [buying one of our paid products](https://spatie.be/open-source/support-us).

We highly appreciate you sending us a postcard from your hometown, mentioning which of our package(s) you are using. You'll find our address on [our contact page](https://spatie.be/about-us). We publish all received postcards on [our virtual postcard wall](https://spatie.be/open-source/postcards).

## Installation

You can install the package via composer:

```bash
composer require lazy-adm/lazy-component
```

You can publish and run the migrations with:

```bash
php artisan vendor:publish --tag="lazy-component-migrations"
php artisan migrate
```

You can publish the config file with:

```bash
php artisan vendor:publish --tag="lazy-component-config"
```

This is the contents of the published config file:

```php
return [
];
```

Optionally, you can publish the views using

```bash
php artisan vendor:publish --tag="lazy-component-views"
```

## Usage

```php
$lazyComponent = new Lazyadm\LazyComponent();
echo $lazyComponent->echoPhrase('Hello, Lazyadm!');
```

## Testing

```bash
composer test
```

## 📁 List of components

<details>
<summary>
  show / hide
</summary>

- Actions

    - [x] Button
    - [ ] Dropdown
    - [ ] Modal
    - [x] Swap

- Data display

    - [x] Alert
    - [x] Avatar
    - [x] Badge
    - [ ] Banner
    - [ ] Calendar
    - [ ] Card
    - [ ] Carousel
    - [x] Chat bubble
    - [ ] Collapse
    - [ ] Countdown
    - [ ] Empty placeholder
    - [x] Kbd
    - [x] Loading
    - [x] Progress
    - [x] Radial progress
    - [ ] Stat
    - [ ] Table
    - [ ] Tag
    - [ ] Timeline
    - [ ] Toast
    - [x] Tooltip
    - [ ] Treeview

- Data input
    - [x] Checkbox
    - [ ] File input
    - [x] Text input
    - [ ] Radio
    - [x] Range
    - [ ] Rating
    - [ ] Select
    - [ ] Multi select
    - [x] Textarea
    - [ ] Toggle
- Layout

    - [ ] Artboard
    - [x] Button group
    - [x] Divider
    - [ ] Drawer
    - [ ] Footer
    - [x] Join
    - [ ] Hero
    - [ ] Indicator
    - [x] Input group
    - [x] Mask
    - [x] Stack

- Navigation

    - [ ] Bottom Navigation
    - [x] Breadcrumbs
    - [x] Link
    - [ ] Menu
    - [ ] Navbar
    - [ ] Pagination
    - [ ] Steps
    - [x] Tab

- Mockup
    - [ ] Browser
    - [ ] Code
    - [x] Phone
    - [ ] Window

</details>

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

## Security Vulnerabilities

Please review [our security policy](../../security/policy) on how to report security vulnerabilities.

## Credits

- [CrazyBoy49z](https://github.com/lazy-adm)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
