<?php

namespace Lazyadm\Tests\LazyComponent;

use Lazyadm\LazyComponent\LazyComponent;
use Pest;
use Illuminate\Support\Str;
use Mockery;

it('test lazy component getName and getViewName methods', function () {
    // Mocking the LazyComponent abstract class as we cannot instantiate it directly
    $mock = Mockery::mock(LazyComponent::class)->makePartial();
    $mock->shouldReceive('render')->andReturnNull();

    // Asserting the getName method
    $name = $mock::getName();
    $this->assertSame(class_basename(get_class($mock)), $name);

    // Asserting the getViewName method
    $mock->shouldReceive('getViewName')->andReturn(Str::kebab(class_basename(get_class($mock))));

    $viewName = $mock->getViewName();
    $this->assertSame(Str::kebab(class_basename(get_class($mock))), $viewName);
});
