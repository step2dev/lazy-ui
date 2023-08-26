<?php

namespace Step2dev\LazyUI\Traits;

trait HasModels
{
    private ?bool $hasLivewireModel = null;

    private ?bool $hasAlpineModel = null;

    final public function hasLivewireModel(): bool
    {
        return $this->hasLivewireModel ??= $this->attributes->whereStartsWith('wire:model')->first();
    }
}
