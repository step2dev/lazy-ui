<?php

namespace Step2dev\LazyUI\Tests\Components;

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
