<?php

namespace Lazyadm\LazyComponent\Tests\Components;

it('can render avatar group without children', function () {
    $this
        ->blade('<x-lazy-avatar-group></x-lazy-avatar-group>')
        ->assertSee('avatar-group')
        ->assertSee('-space-x-6');
});

it('can render avatar group with a single avatar', function () {
    $this
        ->blade('<x-lazy-avatar-group>
                    <x-lazy-avatar src="https://picsum.photos/200/200?random=1"/>
                </x-lazy-avatar-group>')
        ->assertSee('avatar-group')
        ->assertSee('-space-x-6')
        ->assertSee('avatar')
        ->assertSee('src="https://picsum.photos/200/200?random=1"', false);
});

it('can render avatar group with multiple avatars', function () {
    $this
        ->blade('<x-lazy-avatar-group>
                    <x-lazy-avatar src="https://picsum.photos/200/200?random=1"/>
                    <x-lazy-avatar class="w-10" alt="Avatar 1" src="https://picsum.photos/200/200?random=2"/>
                </x-lazy-avatar-group>')
        ->assertSee('avatar-group')
        ->assertSee('-space-x-6')
        ->assertSee('avatar')
        ->assertSee('w-10')
        ->assertSee('alt="Avatar 1"', false)
        ->assertSee('src="https://picsum.photos/200/200?random=2"', false);
});
