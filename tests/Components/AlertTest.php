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

it('can render alert with parameter', function ($parameter, $class) {
    $this
        ->blade("<x-lazy-alert {$parameter} label='Alert Content'/>")
        ->assertSee('alert')
        ->assertSee('Alert Content')
        ->assertSee($class);

    $this
        ->blade("<x-lazy-alert type='{$parameter}' label='Alert Content' />")
        ->assertSee('alert')
        ->assertSee('Alert Content')
        ->assertSee($class);
})->with([
    'info' => ['info', 'alert-info'],
    'success' => ['success', 'alert-success'],
    'warning' => ['warning', 'alert-warning'],
    'error' => ['error', 'alert-error'],
    'default' => ['default', 'alert'],
    '' => ['', 'alert'],
]);

it('can render alert with color and slot', function ($parameter, $class) {
    $this
        ->blade("<x-lazy-alert {$parameter}>Alert Content</x-lazy-alert>")
        ->assertSee('alert')
        ->assertSee('Alert Content')
        ->assertSee($class);

    $this
        ->blade("<x-lazy-alert type='{$parameter}'>Alert Content</x-lazy-alert>")
        ->assertSee('alert')
        ->assertSee('Alert Content')
        ->assertSee($class);
})->with([
    'info' => ['info', 'alert-info'],
    'success' => ['success', 'alert-success'],
    'warning' => ['warning', 'alert-warning'],
    'error' => ['error', 'alert-error'],
    'default' => ['default', 'alert'],
    '' => ['', 'alert'],
]);
