<?php

namespace Step2dev\LazyUI\Tests\Components;

it('can render link', function () {
    $this
        ->blade('<x-lazy-link />')
        ->assertSee('link')
        ->assertSee('class="link"', false)
        ->assertSee('href="#"', false);
});

it('can render link with label', function () {
    $this
        ->blade('<x-lazy-link href="/test" label="link Label"/>')
        ->assertSee('link')
        ->assertSee('class="link"', false)
        ->assertSee('href="/test"', false)
        ->assertSee('link Label')
        ->assertDontSee('label="link Label"', false);
});
//
it('can render link with slot', function () {
    $this
        ->blade('<x-lazy-link href="/test">link Label</x-lazy-link>')
        ->assertSee('link')
        ->assertSee('href="/test"', false)
        ->assertSee('link Label')
        ->assertDontSee('label="link Label"', false);
});

it('can render link with colors', function ($parameter, $class) {
    $this
        ->blade("<x-lazy-link href=\"/test\" label=\"link Label\" {$parameter} />")
        ->assertSee('link')
        ->assertSee('href="/test"', false)
        ->assertSee('link Label')
        ->assertDontSee('label="link Label"', false)
        ->assertSee($class);
})->with([
    'primary' => ['primary', 'link-primary'],
    'secondary' => ['secondary', 'link-secondary'],
    'accent' => ['accent', 'link-accent'],
    'info' => ['info', 'link-info'],
    'success' => ['success', 'link-success'],
    'warning' => ['warning', 'link-warning'],
    'error' => ['error', 'link-error'],
    'hover' => ['hover', 'link-hover'],
]);

it('can render link with colors param', function ($parameter, $class) {
    $this
        ->blade("<x-lazy-link href=\"/test\" label=\"link Label\" color='{$parameter}' />")
        ->assertSee('link')
        ->assertSee('href="/test"', false)
        ->assertSee('link Label')
        ->assertDontSee('label="link Label"', false)
        ->assertSee($class);
})->with([
    'primary' => ['primary', 'link-primary'],
    'secondary' => ['secondary', 'link-secondary'],
    'accent' => ['accent', 'link-accent'],
    'info' => ['info', 'link-info'],
    'success' => ['success', 'link-success'],
    'warning' => ['warning', 'link-warning'],
    'error' => ['error', 'link-error'],
]);
