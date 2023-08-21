<?php

namespace Step2dev\LazyUI\Tests\Components;

it('can render radio', function () {
    $this
        ->blade('<x-lazy-radio />')
        ->assertSee('radio')
        ->assertSee('type="radio"', false);
});

it('can render radio with label', function () {
    $this
        ->blade('<x-lazy-radio label="Radio Label" name="name"/>')
        ->assertSee('radio')
        ->assertSee('type="radio"', false)
        ->assertSee('name="name"', false)
        ->assertSee('Radio Label')
        ->assertDontSee('label="Radio Label"', false);
})->todo();

it('can render radio with slot', function () {
    $this
        ->blade('<x-lazy-radio name="name">Radio Label</x-lazy-radio>')
        ->assertSee('radio')
        ->assertSee('type="radio"', false)
        ->assertSee('name="name"', false)
        ->assertSee('Radio Label')
        ->assertDontSee('label="Radio Label"', false);
})->todo();

it('can render radio with colors', function ($parameter, $class) {
    $this
        ->blade("<x-lazy-radio name=\"name\" {$parameter}  />")
        ->assertSee('radio')
        ->assertSee('type="radio"', false)
        ->assertSee('name="name"', false)
        ->assertSee($class)
        ->assertDontSee('color="primary"', false);
})->with([
    'primary' => ['primary', 'radio-primary'],
    'secondary' => ['secondary', 'radio-secondary'],
    'accent' => ['accent', 'radio-accent'],
    'info' => ['info', 'radio-info'],
    'success' => ['success', 'radio-success'],
    'warning' => ['warning', 'radio-warning'],
    'error' => ['error', 'radio-error'],
]);

it('can render radio with colors param', function ($parameter, $class) {
    $this
        ->blade("<x-lazy-radio name=\"name\" color=\"{$parameter}\"  />")
        ->assertSee('radio')
        ->assertSee('type="radio"', false)
        ->assertSee('name="name"', false)
        ->assertSee($class)
        ->assertDontSee('color="primary"', false);
})->with([
    'primary' => ['primary', 'radio-primary'],
    'secondary' => ['secondary', 'radio-secondary'],
    'accent' => ['accent', 'radio-accent'],
    'info' => ['info', 'radio-info'],
    'success' => ['success', 'radio-success'],
    'warning' => ['warning', 'radio-warning'],
    'error' => ['error', 'radio-error'],
]);
