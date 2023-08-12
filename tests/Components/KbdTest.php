<?php

namespace Lazyadm\LazyComponent\Tests\Components;

use Lazyadm\LazyComponent\Components\Kbd;

it('should have an array of allowed sizes', function () {
    $component = new Kbd();

    expect($component->allowedSizes())->toBeArray();
});

it('should have an array of allowed colors', function () {
    $component = new Kbd();

    expect($component->allowedColors())->toBeArray();
});

it('can render Kdb', function () {
    $this
        ->blade('<x-lazy-kbd></x-lazy-kbd>')
        ->assertSee('<kbd', false)
        ->assertSee('class="kbd', false);

    $this
        ->blade('<x-lazy-kbd>Kbd content</x-lazy-kbd>')
        ->assertSee('<kbd', false)
        ->assertSee('class="kbd', false)
        ->assertSee('Kbd content');
});
