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
        return $this->hasLivewireModel ??= $this->attributes->hasStartsWith('wire:model');
    }

    final public function hasAlpineModel(): bool
    {
        return $this->hasAlpineModel ??= $this->attributes->hasStartsWith('x-model');
    }

}
