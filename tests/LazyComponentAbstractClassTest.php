<?php

namespace Lazyadm\LazyComponent\Tests;

use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use Lazyadm\LazyComponent\LazyComponent;

it('should be an instance of Component', function () {
    $component = new class extends LazyComponent
    {
        public function render(): \Closure|View
        {
            return function (array $data) {
                return view('lazy::alert', $this->mergeData($data))->render();
            };
        }
    };

    expect($component)
        ->toBeInstanceOf(Component::class)
        ->and($component)->toBeInstanceOf(LazyComponent::class)
        ->and($component->allowedSizes())->toBeArray()
        ->and($component->allowedColors())->toBeArray();
});
