<?php

namespace Step2dev\LazyUI\Tests\Components;

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
