<?php

namespace Step2dev\LazyUI\Tests\Components;

it('can render form', function () {
    $this
        ->blade('<x-lazy-form></x-lazy-form>')
        ->assertSee('<form', false)
        ->assertSee('method="POST"', false)
        ->assertSee('type="hidden"', false)
        ->assertSee('name="_token"', false);

    $this
        ->blade('<x-lazy-form method="PUT"></x-lazy-form>')
        ->assertSee('<form', false)
        ->assertSee('method="POST"', false)
        ->assertSee('type="hidden"', false)
        ->assertSee('name="_token"', false)
        ->assertSee('<input type="hidden" name="_method" value="PUT">', false);

    $this
        ->blade('<x-lazy-form method="Delete" action="/test"></x-lazy-form>')
        ->assertSee('<form', false)
        ->assertSee('method="POST"', false)
        ->assertSee('type="hidden"', false)
        ->assertSee('name="_token"', false)
        ->assertSee('<input type="hidden" name="_method" value="DELETE">', false)
        ->assertSee('action="/test"', false);

    $this
        ->blade('<x-lazy-form method="GET" action="/test"></x-lazy-form>')
        ->assertSee('<form', false)
        ->assertSee('method="GET"', false)
        ->assertSee('type="hidden"', false)
        ->assertSee('name="_token"', false)
        ->assertSee('action="/test"', false);
});
