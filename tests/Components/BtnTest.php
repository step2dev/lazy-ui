<?php

namespace Lazyadm\LazyComponent\Tests\Components;

use Illuminate\Support\Facades\Blade;
use Lazyadm\LazyComponent\Components\Badge;

it('should have an array of allowed sizes', function () {
    $component = new Badge();

    expect($component->allowedSizes())->toBeArray();
});

it('should have an array of allowed colors', function () {
    $component = new Badge();

    expect($component->allowedColors())->toBeArray();
});

it('can render button', function () {
    expect(Blade::render('<x-lazy-btn>Go</x-lazy-btn>'))
        ->toContain(
            'type="submit"',
            'class="btn',
            'wire:loading.class="btn-disabled loading"',
            'wire:loading.attr="disabled"',
            'Go'
        )
        ->and(Blade::render('<x-lazy-btn label="Go"/>'))
        ->toContain(
            'type="submit"',
            'class="btn',
            'wire:loading.class="btn-disabled loading"',
            'wire:loading.attr="disabled"',
            'Go'
        )
        ->and(Blade::render('<x-lazy-btn primary label="Go"/>'))
        ->toContain('btn-primary')
        ->and(Blade::render('<x-lazy-btn accent label="Go"/>'))
        ->toContain('btn-accent')
        ->and(Blade::render('<x-lazy-btn info label="Go"/>'))
        ->toContain('btn-info')
        ->and(Blade::render('<x-lazy-btn success label="Go"/>'))
        ->toContain('btn-success')
        ->and(Blade::render('<x-lazy-btn warning label="Go"/>'))
        ->toContain('btn-warning')
        ->and(Blade::render('<x-lazy-btn error label="Go"/>'))
        ->toContain('btn-error')
        ->and(Blade::render('<x-lazy-btn ghost label="Go"/>'))
        ->toContain('btn-ghost')
        ->and(Blade::render('<x-lazy-btn link label="Go"/>'))
        ->toContain('btn-link')

        // check sizes
        ->and(Blade::render('<x-lazy-btn lg label="Go"/>'))
        ->toContain('btn-lg')
        ->and(Blade::render('<x-lazy-btn md label="Go"/>'))
        ->toContain('btn-md')
        ->and(Blade::render('<x-lazy-btn sm label="Go"/>'))
        ->toContain('btn-sm')
        ->and(Blade::render('<x-lazy-btn xs label="Go"/>'))
        ->toContain('btn-xs')

        // check other classes
        ->and(Blade::render('<x-lazy-btn wide label="Go"/>'))
        ->toContain('btn-wide')
        ->and(Blade::render('<x-lazy-btn block label="Go"/>'))
        ->toContain('btn-block')
        ->and(Blade::render('<x-lazy-btn circle label="Go"/>'))
        ->toContain('btn-circle')
        ->and(Blade::render('<x-lazy-btn square label="Go"/>'))
        ->toContain('btn-square')

        ->and(Blade::render('<x-lazy-btn outline label="Go"/>'))
        ->toContain('btn-outline')
        ->and(Blade::render('<x-lazy-btn disabled label="Go"/>'))
        ->toContain('btn-disabled')
        ->and(Blade::render('<x-lazy-btn glass label="Go"/>'))
        ->toContain('glass')
        ->and(Blade::render('<x-lazy-btn active label="Go"/>'))
        ->toContain('btn-active')

        ->and(Blade::render('<x-lazy-btn primary lg label="Go"/>'))
        ->toContain(
            'btn-primary',
            'btn-lg'
        );
});
