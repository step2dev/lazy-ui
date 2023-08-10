<?php

namespace Lazyadm\LazyComponent\Tests\Components;

use Lazyadm\LazyComponent\Components\Avatar;

it('should have an array of allowed sizes', function () {
    $component = new Avatar();

    expect($component->allowedSizes())->toBeArray();
});

it('should have an array of allowed colors', function () {
    $component = new Avatar();

    expect($component->allowedColors())->toBeArray();
});

it('can render avatar', function () {
    $this
        ->blade('<x-lazy-avatar src="https://picsum.photos/200/200?random=1"/>')
        ->assertSee('avatar')
        ->assertSee('src="https://picsum.photos/200/200?random=1"', false)
        ->assertSee('alt="Avatar"', false);

    $this
        ->blade('<x-lazy-avatar class="w-10" alt="Avatar 1" src="https://picsum.photos/200/200?random=2"/>')
        ->assertSee('avatar')
        ->assertSee('w-10')
        ->assertSee('alt="Avatar 1"', false)
        ->assertSee('src="https://picsum.photos/200/200?random=2"', false);

});
