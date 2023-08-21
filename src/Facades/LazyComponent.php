<?php

namespace Step2dev\LazyUI\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see Step2dev\LazyUI\LazyComponent
 */
class LazyComponent extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return \Step2dev\LazyUI\LazyComponent::class;
    }
}
