<?php

namespace Lazyadm\LazyComponent\Traits;

trait HasErrors
{
    private ?bool $hasErrors = null;

    final public function hasErrors(): bool
    {
//        $this->hasErrors ??= $this;
        return false;
    }
}
