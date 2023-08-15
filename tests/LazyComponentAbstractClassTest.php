<?php

namespace Lazyadm\LazyComponent\Tests;

use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use Lazyadm\LazyComponent\Components\Alert;
use Lazyadm\LazyComponent\LazyComponent;

it('should be an instance of Component', function () {
    // expect(LazyComponent::class)->toBeAbstract();

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
        ->and($component->getViewName())->toBeString()
        ->and($component->render())->toBeInstanceOf(\Closure::class)
        ->and(Alert::getName())->toBeString()->toEqual('Alert');
});
