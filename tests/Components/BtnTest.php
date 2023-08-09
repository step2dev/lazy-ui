<?php

namespace Lazyadm\LazyComponent\Tests\Components;

use Illuminate\Support\Facades\Blade;
use Lazyadm\LazyComponent\Components\Badge;
use Pest\Expectations;
use Pest\TestSuite;

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
    ;
});
