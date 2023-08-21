<?php

namespace Step2dev\LazyUI\Traits;

trait HasErrors
{
    protected ?bool $hasErrors = null;

    final public function hasErrors(): bool
    {
        return $this->hasErrors ?? false;
    }
}
