<?php

namespace Lazyadm\LazyComponent\Tests\Components;

use Lazyadm\LazyComponent\Components\AvatarGroup;


it('can render avatar group', function () {
    $this
        ->blade('<x-lazy-avatar-group></x-lazy-avatar-group>')
        ->assertSee('avatar-group')
        ->assertSee('-space-x-6');

    $this
        ->blade('<x-lazy-avatar-group>
<x-lazy-avatar src="https://picsum.photos/200/200?random=1"/>
<x-lazy-avatar class="w-10" alt="Avatar 1" src="https://picsum.photos/200/200?random=2"/>
</x-lazy-avatar-group>')
        ->assertSee('avatar-group')
        ->assertSee('-space-x-6')
        ->assertSee('avatar')
        ->assertSee('src="https://picsum.photos/200/200?random=1"', false)
        ->assertSee('alt="Avatar"', false)
        ->assertSee('avatar')
        ->assertSee('w-10')
        ->assertSee('alt="Avatar 1"', false)
        ->assertSee('src="https://picsum.photos/200/200?random=2"', false);
});
