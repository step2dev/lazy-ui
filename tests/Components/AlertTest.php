<?php

namespace Lazyadm\LazyComponent\Tests\Components;

use Lazyadm\LazyComponent\Components\Alert;

it('should have an array of allowed sizes', function () {
    $component = new Alert();

    expect($component->allowedSizes())->toBeArray();
});

it('should have an array of allowed colors', function () {
    $component = new Alert();

    expect($component->allowedColors())->toBeArray();
});

it('can render alert', function () {
    $this
        ->blade('<x-lazy-alert info>Alert Content</x-lazy-alert>')
        ->assertSee('Alert Content')
        ->assertSee('alert-info', false);

    $this
        ->blade('<x-lazy-alert success>Alert Content</x-lazy-alert>')
        ->assertSee('Alert Content')
        ->assertSee('alert-success', false);

    $this
        ->blade('<x-lazy-alert warning>Alert Content</x-lazy-alert>')
        ->assertSee('Alert Content')
        ->assertSee('alert-warning', false);

    $this
        ->blade('<x-lazy-alert type="error">Alert Content</x-lazy-alert>')
        ->assertSee('Alert Content')
        ->assertSee('alert-error', false);

    $this
        ->blade('<x-lazy-alert type="default">Alert Content</x-lazy-alert>')
        ->assertSee('Alert Content')
        ->assertSee('alert', false);
});
