<?php

namespace Lazyadm\LazyComponent\Tests\Components;

use Lazyadm\LazyComponent\Components\Accordion;
use Lazyadm\LazyComponent\Components\Badge;

it('should have an array of allowed sizes', function () {
    $component = new Accordion();

    expect($component->allowedSizes())->toBeArray();
});

it('should have an array of allowed colors', function () {
    $component = new Accordion();

    expect($component->allowedColors())->toBeArray();
});

it('can render accordion', function () {
    $this
        ->blade('<x-lazy-accordion title="Accordion Title" name="name" :active="true">Accordion Content</x-lazy-accordion>')
        ->assertSee('Accordion Title')
        ->assertSee('Accordion Content')
        ->assertSee('name="name"', false)
        ->assertSee('checked=checked', false)
        ->assertSee('collapse', false);

    $this
        ->blade('<x-lazy-accordion title="Accordion Title">Accordion Content</x-lazy-accordion>')
        ->assertSee('Accordion Title')
        ->assertSee('Accordion Content')
        ->assertSee('name="accordion"', false);
});
