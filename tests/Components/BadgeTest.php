<?php

namespace Lazyadm\LazyComponent\Tests\Components;

use Lazyadm\LazyComponent\Components\Badge;

it('should have an array of allowed sizes', function () {
    $component = new Badge();

    expect($component->allowedSizes())->toBeArray();
});

it('should have an array of allowed colors', function () {
    $component = new Badge();

    expect($component->allowedColors())->toBeArray();
});

it('can render badge', function () {
    $this
        ->blade('<x-lazy-badge>Badge</x-lazy-badge>')
        ->assertSee('badge')
        ->assertSee('Badge');

    $this
        ->blade('<x-lazy-badge label="Badge"/>')
        ->assertSee('badge')
        ->assertSee('Badge');

    $this
        ->blade("<x-lazy-badge label=\"Badge\" icon='<i class=\"fas fa-home\"></i>'/>")
        ->assertSee('badge')
        ->assertSee('Badge')
        ->assertSee('<i class="fas fa-home"></i>');

    $this
        ->blade('<x-lazy-badge label="Badge">
<x-slot:icon>
<i class="fas fa-home"></i>
</x-slot:icon>
</x-lazy-badge>')
        ->assertSee('badge')
        ->assertSee('Badge')
        ->assertSee('<i class="fas fa-home"></i>', false);
});

it('can render with colors attribute', function () {
    $this
        ->blade('<x-lazy-badge primary />')
        ->assertSee('badge-primary');

    $this
        ->blade('<x-lazy-badge secondary />')
        ->assertSee('badge-secondary');

    $this
        ->blade('<x-lazy-badge accent />')
        ->assertSee('badge-accent');

    $this
        ->blade('<x-lazy-badge info />')
        ->assertSee('badge-info');

    $this
        ->blade('<x-lazy-badge success />')
        ->assertSee('badge-success');

    $this
        ->blade('<x-lazy-badge warning/>')
        ->assertSee('badge-warning');

    $this
        ->blade('<x-lazy-badge error/>')
        ->assertSee('badge-error');

    $this
        ->blade('<x-lazy-badge ghost/>')
        ->assertSee('badge-ghost');
});
