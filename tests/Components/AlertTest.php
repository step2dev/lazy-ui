<?php

namespace Lazyadm\LazyComponent\Tests\Components;

use Lazyadm\LazyComponent\Components\Alert;

it('should have an array of allowed sizes', function () {
    $component = new Alert();

    expect($component->allowedSizes())->toBeArray();
});

it('should have an array of allowed colors', function () {
    $component = new Alert();

    expect($component->allowedColors())->toBeArray();
});
