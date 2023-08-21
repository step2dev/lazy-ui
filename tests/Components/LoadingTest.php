<?php

namespace Lazyadm\LazyComponent\Tests\Components;

it('can render loading', function () {
    $this
        ->blade('<x-lazy-loading />')
        ->assertSee('loading')
        ->assertSee('loading-md')
        ->assertSee('loading-spinner');
});

it('can render checkbox with colors', function ($parameter, $class) {
    $this
        ->blade("<x-lazy-loading {$parameter}  />")
        ->assertSee('loading')
        ->assertSee('loading-md')
        ->assertSee('loading-spinner')
        ->assertSee($class)
        ->assertDontSee('color="primary"', false);
})->with([
    'primary' => ['primary', 'text-primary'],
    'secondary' => ['secondary', 'text-secondary'],
    'accent' => ['accent', 'text-accent'],
    'info' => ['info', 'text-info'],
    'success' => ['success', 'text-success'],
    'warning' => ['warning', 'text-warning'],
    'error' => ['error', 'text-error'],
]);

it('can render checkbox with colors param', function ($parameter, $class) {
    $this
        ->blade("<x-lazy-loading color=\"{$parameter}\"  />")
        ->assertSee('loading')
        ->assertSee('loading-md')
        ->assertSee('loading-spinner')
        ->assertSee($class)
        ->assertDontSee("color=\"{$parameter}\"", false);
})->with([
    'primary' => ['primary', 'text-primary'],
    'secondary' => ['secondary', 'text-secondary'],
    'accent' => ['accent', 'text-accent'],
    'info' => ['info', 'text-info'],
    'success' => ['success', 'text-success'],
    'warning' => ['warning', 'text-warning'],
    'error' => ['error', 'text-error'],
]);

it('can render with type', function ($parameter, $class) {
    $this
        ->blade("<x-lazy-loading type=\"{$parameter}\" />")
        ->assertSee('loading')
        ->assertSee($class)
        ->assertDontSee("type=\"{$parameter}\"", false);
})->with([
    'spinner' => ['spinner', 'loading-spinner'],
    'dots' => ['dots', 'loading-dots'],
    'ring' => ['ring', 'loading-ring'],
    'ball' => ['ball', 'loading-ball'],
    'bars' => ['bars', 'loading-bars'],
    'infinity' => ['infinity', 'loading-infinity'],
]);

it('can render with size', function ($parameter, $class) {
    $this
        ->blade("<x-lazy-loading size=\"{$parameter}\"  />")
        ->assertSee('loading')
        ->assertSee($class)
        ->assertDontSee("size=\"{$parameter}\"", false);
})->with([
    'xs' => ['xs', 'loading-xs'],
    'sm' => ['sm', 'loading-sm'],
    'md' => ['md', 'loading-md'],
    'lg' => ['lg', 'loading-lg'],
    // 'xl' => ['xl', 'loading-xl'],
    // '2xl' => ['2xl', 'loading-2xl'],
]);
