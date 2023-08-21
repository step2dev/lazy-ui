<?php

namespace Lazyadm\LazyComponent\Tests\Components;

it('can render checkbox', function () {
    $this
        ->blade('<x-lazy-checkbox />')
        ->assertSee('checkbox')
        ->assertSee('type="checkbox"', false);
});

it('can render checkbox with label', function () {
    $this
        ->blade('<x-lazy-checkbox label="checkbox Label" name="name"/>')
        ->assertSee('checkbox')
        ->assertSee('type="checkbox"', false)
        ->assertSee('name="name"', false)
        ->assertSee('checkbox Label')
        ->assertDontSee('label="checkbox Label"', false);
})->todo();

it('can render checkbox with slot', function () {
    $this
        ->blade('<x-lazy-checkbox name="name">checkbox Label</x-lazy-checkbox>')
        ->assertSee('checkbox')
        ->assertSee('type="checkbox"', false)
        ->assertSee('name="name"', false)
        ->assertSee('checkbox Label')
        ->assertDontSee('label="checkbox Label"', false);
})->todo();

it('can render checkbox with colors', function ($parameter, $class) {
    $this
        ->blade("<x-lazy-checkbox name=\"name\" {$parameter}  />")
        ->assertSee('checkbox')
        ->assertSee('type="checkbox"', false)
        ->assertSee('name="name"', false)
        ->assertSee($class)
        ->assertDontSee('color="primary"', false);
})->with([
    'primary' => ['primary', 'checkbox-primary'],
    'secondary' => ['secondary', 'checkbox-secondary'],
    'accent' => ['accent', 'checkbox-accent'],
    'info' => ['info', 'checkbox-info'],
    'success' => ['success', 'checkbox-success'],
    'warning' => ['warning', 'checkbox-warning'],
    'error' => ['error', 'checkbox-error'],
]);

it('can render checkbox with colors param', function ($parameter, $class) {
    $this
        ->blade("<x-lazy-checkbox name=\"name\" color=\"{$parameter}\"  />")
        ->assertSee('checkbox')
        ->assertSee('type="checkbox"', false)
        ->assertSee('name="name"', false)
        ->assertSee($class)
        ->assertDontSee('color="primary"', false);
})->with([
    'primary' => ['primary', 'checkbox-primary'],
    'secondary' => ['secondary', 'checkbox-secondary'],
    'accent' => ['accent', 'checkbox-accent'],
    'info' => ['info', 'checkbox-info'],
    'success' => ['success', 'checkbox-success'],
    'warning' => ['warning', 'checkbox-warning'],
    'error' => ['error', 'checkbox-error'],
]);


