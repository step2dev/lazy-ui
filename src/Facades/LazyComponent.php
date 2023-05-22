<?php

namespace Lazyadm\LazyComponent\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Lazyadm\LazyComponent\LazyComponent
 */
class LazyComponent extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return \Lazyadm\LazyComponent\LazyComponent::class;
    }
}
