<?php

namespace Lazyadm\LazyComponent\Tests\Components;

it('can render image', function () {
    $this
        ->blade('<x-lazy-image src="https://picsum.photos/200/200?random=1" alt="Image"/>')
        ->assertSee('<img', false)
        ->assertSee('class=""', false)
        ->assertSee('src="https://picsum.photos/200/200?random=1"', false)
        ->assertSee('alt="Image"', false);
});

it('can render image mask', function ($parameter, $class){
    $this
        ->blade("<x-lazy-image src=\"https://picsum.photos/200/200?random=1\" alt=\"Image\" mask='{$parameter}'/>")
        ->assertSee('<img', false)
        ->assertSee('src="https://picsum.photos/200/200?random=1"', false)
        ->assertSee('alt="Image"', false)
        ->assertSee('mask', false)
        ->assertSee($class);
    ;
})->with([
    'mask-squircle' => ['squircle', 'mask-squircle'],
    'mask-heart' => ['heart', 'mask-heart'],
    'mask-hexagon' => ['hexagon', 'mask-hexagon'],
    'mask-hexagon-2' => ['hexagon-2',   'mask-hexagon-2'],
    'mask-decagon' => ['decagon', 'mask-decagon'],
    'mask-pentagon' => ['pentagon', 'mask-pentagon'],
    'mask-diamond' => ['diamond', 'mask-diamond'],
    'mask-square' => ['square', 'mask-square'],
    'mask-circle' => ['circle', 'mask-circle'],
    'mask-parallelogram' => ['parallelogram', 'mask-parallelogram'],
    'mask-parallelogram-2' => ['parallelogram-2', 'mask-parallelogram-2'],
    'mask-parallelogram-3' => ['parallelogram-3', 'mask-parallelogram-3'],
    'mask-parallelogram-4' => ['parallelogram-4',   'mask-parallelogram-4'],
    'mask-star' => ['star','mask-star'],
    'mask-star-2' => ['star-2', 'mask-star-2'],
    'mask-triangle' => ['triangle', 'mask-triangle'],
    'mask-triangle-2' => ['triangle-2', 'mask-triangle-2'],
    'mask-triangle-3' => ['triangle-3', 'mask-triangle-3'],
    'mask-triangle-4' => ['triangle-4', 'mask-triangle-4'],
    // 'mask-half-1' => false,
    // 'mask-half-2' => false,
]);
