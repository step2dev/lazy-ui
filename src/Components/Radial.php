<?php

namespace Step2dev\LazyUI\Components;

use Illuminate\View\ComponentAttributeBag;

class Radial extends DaisyComponent
{
    protected const VIEW = 'lazy::radial';

    public string $resolvedStyle;

    public function __construct(
        public int|float $value = 0,
        public string $size = '',
        public string $thickness = '',
        public string $color = '',
        public ?string $label = null,
    ) {
        $this->value = max(0, min(100, (float) $this->value));

        $parts = ['--value: '.$this->value];

        if ($this->size !== '') {
            $parts[] = '--size: '.$this->size;
        }

        if ($this->thickness !== '') {
            $parts[] = '--thickness: '.$this->thickness;
        }

        $this->resolvedStyle = implode('; ', $parts).';';
    }

    protected function componentClasses(array $data, ComponentAttributeBag $attributes): array
    {
        return [
            'radial-progress',
            'text-primary' => $this->color === 'primary',
            'text-secondary' => $this->color === 'secondary',
            'text-accent' => $this->color === 'accent',
            'text-neutral' => $this->color === 'neutral',
            'text-info' => $this->color === 'info',
            'text-success' => $this->color === 'success',
            'text-warning' => $this->color === 'warning',
            'text-error' => $this->color === 'error',
        ];
    }

    protected function prepareAttributes(ComponentAttributeBag $attributes): ComponentAttributeBag
    {
        $existing = trim((string) $attributes->get('style', ''));

        $attributes['style'] = trim($existing.' '.$this->resolvedStyle);

        return $attributes;
    }
}
