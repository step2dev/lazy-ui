<?php

namespace Step2dev\LazyUI\Tests\Components;

it('can render Label', function () {
    $this
        ->blade('<x-lazy-label></x-lazy-label>')
        ->assertSee('<label', false)
        ->assertDontSee('label-text');

    $this
        ->blade('<x-lazy-label>label content</x-lazy-label>')
        ->assertSee('<label', false)
        ->assertDontSee('label-text')
        ->assertSee('label content');

    $this
        ->blade('<x-lazy-label label="label content"/>')
        ->assertSee('<label', false)
        ->assertDontSee('label-text')
        ->assertDontSee('label content')
        ->assertSee('Label content');
});
