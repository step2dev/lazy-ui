<?php

namespace Step2dev\LazyUI\Components;

use Illuminate\View\ComponentAttributeBag;

class Rating extends DaisyComponent
{
    protected const VIEW = 'lazy::rating';

    public string $maskClass;

    public string $colorClass;

    public array $ratingItems = [];

    public function __construct(
        public string $name = 'rating',
        public int $items = 5,
        public int|float|null $value = null,
        public string $mask = 'star-2',
        public ?string $type = null,
        public string $color = '',
        public string $size = '',
        public bool $half = false,
        public bool $clearable = false,
        public bool $readonly = false,
    ) {
        $resolvedMask = $this->type ?: $this->mask;

        $this->maskClass = match ($resolvedMask) {
            'heart' => 'mask-heart',
            'star' => 'mask-star',
            default => 'mask-star-2',
        };

        $this->colorClass = match ($this->color) {
            'primary' => 'bg-primary',
            'secondary' => 'bg-secondary',
            'accent' => 'bg-accent',
            'success' => 'bg-success',
            'info' => 'bg-info',
            'warning' => 'bg-warning',
            'error' => 'bg-error',
            default => '',
        };

        $count = max(1, min(100, $this->items));
        $steps = $this->half ? $count * 2 : $count;

        for ($index = 1; $index <= $steps; $index++) {
            $ratingValue = $this->half ? $index / 2 : $index;

            $this->ratingItems[] = [
                'value' => $ratingValue,
                'label' => $ratingValue.' '.($ratingValue == 1 ? 'star' : 'stars'),
                'checked' => (float) $this->value === (float) $ratingValue,
                'halfClass' => ! $this->half ? '' : ($index % 2 === 1 ? 'mask-half-1' : 'mask-half-2'),
            ];
        }
    }

    protected function componentClasses(array $data, ComponentAttributeBag $attributes): array
    {
        return [
            'rating',
            'rating-half' => $this->half,
            'rating-xs' => $this->size === 'xs',
            'rating-sm' => $this->size === 'sm',
            'rating-md' => $this->size === 'md',
            'rating-lg' => $this->size === 'lg',
            'rating-xl' => $this->size === 'xl',
        ];
    }

    protected function componentData(array $data, ComponentAttributeBag $attributes): array
    {
        return [
            'inputAttributes' => $attributes->only([
                'wire:model',
                'wire:model.live',
                'wire:model.blur',
                'wire:model.change',
                'wire:model.lazy',
                'disabled',
                'form',
                'required',
            ]),
        ];
    }

    protected function consumedAttributes(): array
    {
        return [
            'wire:model',
            'wire:model.live',
            'wire:model.blur',
            'wire:model.change',
            'wire:model.lazy',
            'disabled',
            'form',
            'required',
        ];
    }
}
