<?php

namespace Step2dev\LazyUI\Tests\Components;

it('can render Label', function () {
    $this
        ->blade('<x-lazy-divider />')
        ->assertSee('divider', false);

    $this
        ->blade('<x-lazy-divider text="Divider Text"/>')
        ->assertSee('divider', false)
        ->assertSee('Divider Text');

    $this
        ->blade('<x-lazy-divider>Divider Text</x-lazy-divider>')
        ->assertSee('divider', false)
        ->assertSee('Divider Text');

    $this
        ->blade('Text before<x-lazy-divider text="Divider Text"/>Text after')
        ->assertSee('divider', false)
        ->assertSee('Divider Text')
        ->assertSee('Text before')
        ->assertSee('Text after');
});
