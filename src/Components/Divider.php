<?php

namespace Step2dev\LazyUI\Components;

use Illuminate\View\ComponentAttributeBag;

class Divider extends DaisyComponent
{
    protected const VIEW = 'lazy::divider';

    public function __construct(
        public string $text = '',
        public string $orientation = 'vertical',
    ) {}

    protected function componentClasses(array $data, ComponentAttributeBag $attributes): array
    {
        $orientation = $this->orientation;

        if ($attributes->has('hr') || $attributes->has('horizontal')) {
            $orientation = 'horizontal';
        } elseif ($attributes->has('vertical')) {
            $orientation = 'vertical';
        }

        return [
            'divider',
            'divider-horizontal' => in_array($orientation, ['horizontal', 'hr'], true),
        ];
    }

    protected function consumedAttributes(): array
    {
        return ['hr', 'horizontal', 'vertical'];
    }
}
