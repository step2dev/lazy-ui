<?php

namespace Lazyadm\LazyComponent\Tests;

use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use Lazyadm\LazyComponent\LazyComponent;
use PHPUnit\Framework\TestCase;

class LazyComponentAbstractClassTest extends TestCase
{
    public function testLazyComponentAbstractClass(): void
    {
        $component = new class extends LazyComponent {
            public function render(): \Closure|View
            {
                return function (array $data) {
                    return view('lazy::alert', $this->mergeData($data))->render();
                };
            }
        };

        $this->assertInstanceOf(Component::class, $component, 'LazyComponent should be an instance of Component');
        $this->assertInstanceOf(LazyComponent::class, $component, 'LazyComponent should be an instance of LazyComponent');

        $this->assertIsArray($component->allowedSizes(), 'LazyComponent should have an array of allowed sizes');
        $this->assertIsArray($component->allowedColors(), 'LazyComponent should have an array of allowed colors');

    }


}
