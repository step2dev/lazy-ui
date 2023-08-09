<?php

namespace Lazyadm\LazyComponent\Tests\Components;

use Lazyadm\LazyComponent\Components\Avatar;
use Pest\Expectations;
use Pest\TestSuite;

it('should have an array of allowed sizes', function () {
    $component = new Avatar();

    expect($component->allowedSizes())->toBeArray();
});

it('should have an array of allowed colors', function () {
    $component = new Avatar();

    expect($component->allowedColors())->toBeArray();
});
