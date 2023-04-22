<?php

namespace Lazyadm\LazyComponent\Traits;

trait HasModels
{
    private ?bool $hasLivewireModel = null;

    private ?bool $hasAlpineModel = null;

    final public function hasBoundModel(): bool
    {
        return $this->hasLivewireModel() || $this->hasAlpineModel();
    }

    final public function hasLivewireModel(): bool
    {
        return $this->hasLivewireModel ??= $this->attributes->whereStartsWith('wire:model')->first();
    }

    final public function hasAlpineModel(): bool
    {
        return $this->hasAlpineModel ??= $this->attributes->whereStartsWith('x-model')->first();
    }
}
