<?php

namespace Lazyadm\LazyComponent\Tests\Components;

use Lazyadm\LazyComponent\Components\BtnGroup;

it('should have an array of allowed sizes', function () {
    $component = new BtnGroup();

    expect($component->allowedSizes())->toBeArray();
});

it('should have an array of allowed colors', function () {
    $component = new BtnGroup();

    expect($component->allowedColors())->toBeArray();
});

it('can render btn group', function () {
    $this
        ->blade('<x-lazy-btn-group></x-lazy-btn-group>')
        ->assertSee('join');

    $this
        ->blade('<x-lazy-btn-group>
            <x-lazy-btn label="Go"/>
            <x-lazy-btn label="Back"/>
</x-lazy-btn-group>')
        ->assertSee('join')
        ->assertSee('Go')
        ->assertSee('Back');
});
