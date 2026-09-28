<?php

namespace Step2dev\LazyUI\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Step2dev\LazyUI\LazyComponent;

class Tab extends LazyComponent
{
    public function __construct(
        public string $label = '',
        public bool $active = false,
        public bool $disabled = false,
    ) {}

    public function render(): View|Closure
    {
        return function (array $data) {
            $attributes = $this->getAttributesFromData($data);
            $data['label'] = $this->label ?: ($attributes['title'] ?? '');
            $data['disabled'] = $this->disabled || $this->truthy($attributes->get('disabled'));

            if ($data['disabled']) {
                $attributes['aria-disabled'] = 'true';
                $attributes['tabindex'] = '-1';
            }

            $data['attributes'] = $attributes;
            $size = $this->getSizeByAttribute($attributes);

            return view('lazy::tab', $this->mergeData($data, [
                'tab',
                'tab-active' => $this->active || $this->truthy($attributes->get('active')),
                'tab-disabled' => $data['disabled'],
                'tab-sm' => $size === 'sm',
                'tab-md' => $size === 'md',
                'tab-lg' => $size === 'lg',
                'tab-xl' => $size === 'xl',
                'tab-xs' => $size === 'xs',
            ], [
                'active',
                'disabled',
                'size',
                'title',
            ]))->render();
        };
    }

    private function truthy(mixed $value): bool
    {
        return $value !== false && $value !== null && $value !== 'false' && $value !== '0' && $value !== 0;
    }
}
