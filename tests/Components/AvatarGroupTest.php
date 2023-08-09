<?php

namespace Lazyadm\LazyComponent\Tests\Components;

use Lazyadm\LazyComponent\Components\AvatarGroup;

it('should have an array of allowed sizes', function () {
    $component = new AvatarGroup();

    expect($component->allowedSizes())->toBeArray();
});

it('should have an array of allowed colors', function () {
    $component = new AvatarGroup();

    expect($component->allowedColors())->toBeArray();
});
