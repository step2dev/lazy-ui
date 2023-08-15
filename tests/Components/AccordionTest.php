<?php

namespace Lazyadm\LazyComponent\Tests\Components;

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
