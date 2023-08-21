<?php

namespace Lazyadm\LazyComponent\Tests\Components;

it('can render alert with parameter for both label and slot', function ($parameter, $class) {
    // For Label
    $this->blade("<x-lazy-alert {$parameter} label='Alert Content'/>")
        ->assertSee('alert')
        ->assertSee('Alert Content')
        ->assertSee($class);

    $this->blade("<x-lazy-alert type='{$parameter}' label='Alert Content' />")
        ->assertSee('alert')
        ->assertSee('Alert Content')
        ->assertSee($class);

    // For Slot
    $this->blade("<x-lazy-alert {$parameter}>Alert Content</x-lazy-alert>")
        ->assertSee('alert')
        ->assertSee('Alert Content')
        ->assertSee($class);

    $this->blade("<x-lazy-alert type='{$parameter}'>Alert Content</x-lazy-alert>")
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
