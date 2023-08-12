<?php

namespace Lazyadm\LazyComponent\Tests\Components;

use Lazyadm\LazyComponent\Components\Label;

it('can render Label', function () {
    $this
        ->blade('<x-lazy-label></x-lazy-label>')
        ->assertSee('<label', false)
        ->assertSee('class="label-text', false);

    $this
        ->blade('<x-lazy-label>label content</x-lazy-label>')
        ->assertSee('<label', false)
        ->assertSee('class="label-text', false)
        ->assertSee('label content');

    $this
        ->blade('<x-lazy-label label="label content"/>')
        ->assertSee('<label', false)
        ->assertSee('class="label-text', false)
        ->assertDontSee('label content')
        ->assertSee('Label content');
});
