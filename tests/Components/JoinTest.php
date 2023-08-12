<?php

namespace Lazyadm\LazyComponent\Tests\Components;

use Lazyadm\LazyComponent\Components\Join;

it('should have an array of allowed sizes', function () {
    $component = new Join();

    expect($component->allowedSizes())->toBeArray();
});

it('should have an array of allowed colors', function () {
    $component = new Join();

    expect($component->allowedColors())->toBeArray();
});

it('can render join group', function () {
    $this
        ->blade('<x-lazy-join></x-lazy-join>')
        ->assertSee('join');

    $this
        ->blade('<x-lazy-join>
            <x-lazy-btn label="Go"/>
            <x-lazy-btn label="Back"/>
</x-lazy-join>')
        ->assertSee('join')
        ->assertSee('Go')
        ->assertSee('Back');
});
