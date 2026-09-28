<?php

namespace Step2dev\LazyUI\Components;

use Illuminate\Contracts\View\View;
use Step2dev\LazyUI\LazyComponent;

class Choices extends LazyComponent
{
    public array $normalizedOptions = [];

    public function __construct(
        public array|string $options = [],
        public string $label = '',
        public string $placeholder = 'Please select a value',
        public string|int|float|null $value = null,
    ) {
        if (is_array($this->options)) {
            foreach ($this->options as $key => $option) {
                if (is_array($option)) {
                    $optionValue = $option['value'] ?? $key;
                    $optionLabel = $option['label'] ?? $option['text'] ?? $optionValue;
                    $disabled = (bool) ($option['disabled'] ?? false);
                } else {
                    $optionValue = is_int($key) ? $option : $key;
                    $optionLabel = $option;
                    $disabled = false;
                }

                $this->normalizedOptions[] = [
                    'value' => $optionValue,
                    'label' => (string) $optionLabel,
                    'disabled' => $disabled,
                ];
            }
        }
    }

    public function render(): \Closure|View
    {
        return function (array $data) {
            $attributes = $this->getAttributesFromData($data);
            $modelAttribute = null;

            foreach (array_keys($attributes->getAttributes()) as $key) {
                if (str_starts_with($key, 'wire:model')) {
                    $modelAttribute = $key;
                    break;
                }
            }

            $model = $modelAttribute ? $attributes->get($modelAttribute) : null;
            $unstyled = $this->truthy($attributes->get('unstyled'));

            return view('lazy::choices', [
                ...$data,
                'attributes' => $attributes,
                'unstyled' => $unstyled,
                'viewClasses' => [
                    'wrapper' => $unstyled ? '' : 'fieldset w-full',
                    'label' => $unstyled ? '' : 'label',
                    'native' => $unstyled ? '' : 'sr-only',
                    'button' => $unstyled ? '' : 'select w-full flex items-center justify-between text-left cursor-pointer',
                    'listbox' => $unstyled ? '' : 'menu dropdown-content bg-base-100 rounded-box z-50 mt-1 max-h-60 w-full overflow-auto p-2 shadow-lg',
                ],
                'model' => $model,
                'modelLive' => $modelAttribute && str_contains($modelAttribute, '.live'),
                'optionsExpression' => is_string($this->options) ? ($this->options ?: '[]') : '[]',
                'nativeAttributes' => $attributes->only(['id', 'name', 'required', 'disabled', 'form']),
                'visualAttributes' => $attributes->except(array_filter([
                    $modelAttribute,
                    'id', 'name', 'required', 'disabled', 'form', 'unstyled',
                ])),
            ]);
        };
    }

    private function truthy(mixed $value): bool
    {
        return $value !== false && $value !== null && $value !== 'false' && $value !== '0' && $value !== 0;
    }
}
