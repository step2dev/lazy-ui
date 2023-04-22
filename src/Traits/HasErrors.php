<?php

namespace Lazyadm\LazyComponent\Traits;

trait HasErrors
{
    protected ?bool $hasErrors = null;

    final public function hasErrors(): bool
    {
        return $this->hasErrors ?? false;
    }
}
