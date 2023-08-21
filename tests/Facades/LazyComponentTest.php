<?php
use Lazyadm\LazyComponent\Facades\LazyComponent;
use Lazyadm\LazyComponent\LazyComponent as ActualLazyComponent;

use function Pest\Laravel\mock;

it('resolves to the correct class from the facade accessor', function () {
    mock(ActualLazyComponent::class);

    $facadeRoot = LazyComponent::getFacadeRoot();

    expect($facadeRoot)->toBeInstanceOf(ActualLazyComponent::class);
});
