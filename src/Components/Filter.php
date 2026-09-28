<?php

namespace Step2dev\LazyUI\Components;

use Illuminate\View\ComponentAttributeBag;

class Filter extends DaisyComponent
{
    protected const VIEW = 'lazy::filter';

    public array $items;

    public function __construct(
        array $options = [],
        public string $name = 'filter',
        public string $resetLabel = '×',
        public mixed $value = null,
    ) {
        $this->items = [];

        foreach ($options as $key => $label) {
            $itemValue = is_int($key) ? $label : $key;
            $this->items[] = [
                'value' => $itemValue,
                'label' => (string) $label,
                'checked' => (string) $itemValue === (string) $this->value,
            ];
        }
    }

    protected function componentClasses(array $data, ComponentAttributeBag $attributes): array
    {
        return ['filter'];
    }
}
