<?php

namespace Lazyadm\LazyComponent\Tests\Components;

it('displays lazy alert when key is empty and message is provided', function () {
    $this
        ->blade('<x-lazy-error message="Error message"/>')
        ->assertSee('alert')
        ->assertSee('alert-error')
        ->assertSee('Error message', false);

    $this
        ->withViewErrors(['email' => 'Error message email']);

    $this
        ->blade('<x-lazy-error key="email"/>')
        ->assertSee('alert')
        ->assertSee('alert-error')
        ->assertSee('Error message email', false);

    $this
        ->blade('<x-lazy-error key="email" message="Error message email2"/>')
        ->assertSee('alert')
        ->assertSee('alert-error')
        ->assertSee('Error message email', false)
        ->assertDontSee('Error message email2', false);
});
