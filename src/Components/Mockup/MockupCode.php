<?php

namespace Step2dev\LazyUI\Components\Mockup;

use Illuminate\View\ComponentAttributeBag;
use Step2dev\LazyUI\Components\DaisyComponent;

class MockupCode extends DaisyComponent
{
    protected const VIEW = 'lazy::mockup.code';

    public array $lines = [];

    public function __construct(
        array $lines = [],
        public string $prefix = '$',
        public bool $scroll = true,
    ) {
        foreach (array_values($lines) as $index => $line) {
            $normalized = is_array($line) ? $line : ['code' => $line];

            $state = (string) ($normalized['state'] ?? '');
            $color = (string) ($normalized['color'] ?? '');

            $this->lines[] = [
                'code' => (string) ($normalized['code'] ?? $normalized['text'] ?? ''),
                'prefix' => array_key_exists('prefix', $normalized)
                    ? (string) $normalized['prefix']
                    : $this->prefix,
                'classes' => $this->classes([
                    (string) ($normalized['class'] ?? '') => isset($normalized['class']),
                    'bg-warning text-warning-content' => $state === 'warning' || $color === 'warning',
                    'bg-error text-error-content' => $state === 'error' || $color === 'error',
                    'bg-success text-success-content' => $state === 'success' || $color === 'success',
                    'bg-info text-info-content' => $state === 'info' || $color === 'info',
                    'bg-primary text-primary-content' => $state === 'primary' || $color === 'primary',
                    'bg-secondary text-secondary-content' => $state === 'secondary' || $color === 'secondary',
                    'bg-accent text-accent-content' => $state === 'accent' || $color === 'accent',
                ]),
            ];
        }
    }

    protected function componentClasses(array $data, ComponentAttributeBag $attributes): array
    {
        return [
            'mockup-code',
            'overflow-x-auto' => $this->scroll,
        ];
    }

    protected function componentData(array $data, ComponentAttributeBag $attributes): array
    {
        $lines = $this->lines;

        if ($this->truthy($attributes->get('unstyled'))) {
            $lines = array_map(static fn (array $line): array => [
                ...$line,
                'classes' => '',
            ], $lines);
        }

        return ['lines' => $lines];
    }
}
