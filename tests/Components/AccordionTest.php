<?php

namespace Lazyadm\LazyComponent\Tests\Components;

use Lazyadm\LazyComponent\Components\Accordion;

it('should have an array of allowed sizes', function () {
    $component = new Accordion();

    expect($component->allowedSizes())->toBeArray();
});

it('should have an array of allowed colors', function () {
    $component = new Accordion();

    expect($component->allowedColors())->toBeArray();
});

it('should have render callable', function () {
    $component = new Accordion();

    expect($component->render())
        ->toBeCallable();
});
