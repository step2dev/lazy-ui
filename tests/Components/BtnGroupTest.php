<?php

namespace Lazyadm\LazyComponent\Tests\Components;

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
