<?php

namespace Step2dev\LazyUI\Components;

use Illuminate\View\ComponentAttributeBag;

class Filter extends DaisyComponent
{
    protected const VIEW = 'lazy::filter';

    public array $items = [];

    public function __construct(
        array $options = [],
        public string $name = 'filter',
        public string $resetLabel = '×',
        public mixed $value = null,
    ) {
        foreach ($options as $key => $option) {
            $normalized = is_array($option) ? $option : ['label' => $option];
            $itemValue = $normalized['value'] ?? (is_int($key) ? $option : $key);
            $label = $normalized['label'] ?? $normalized['text'] ?? $itemValue;

            $this->items[] = [
                'value' => $itemValue,
                'label' => (string) $label,
                'checked' => array_key_exists('checked', $normalized)
                    ? (bool) $normalized['checked']
                    : (string) $itemValue === (string) $this->value,
                'disabled' => (bool) ($normalized['disabled'] ?? false),
                'classes' => $this->classes([
                    'btn',
                    'btn-active' => (string) $itemValue === (string) $this->value,
                ]),
            ];
        }
    }

    protected function componentClasses(array $data, ComponentAttributeBag $attributes): array
    {
        return ['filter'];
    }
}
