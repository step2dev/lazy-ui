<?php

namespace Step2dev\LazyUI\Components;

use Illuminate\Contracts\View\View;
use Step2dev\LazyUI\LazyComponent;

class Btn extends LazyComponent
{
    protected string $disableClass = 'btn-disabled';

    public bool $outline = false;

    public string $tag;

    public function __construct(
        public bool $rounded = false,
        public bool $squared = false,
        public string $label = '',
        public ?string $icon = null,
        public ?string $rightIcon = null,
        public ?string $href = null,
        private ?string $glass = null,
        private ?string $active = null,
    ) {
        $this->tag = $this->href === null ? 'button' : 'a';
    }

    public function allowedColors(): array
    {
        return [
            'neutral',
            'primary',
            'secondary',
            'accent',
            'ghost',
            'info',
            'success',
            'warning',
            'error',
            'danger',
            'link',
        ];
    }

    public function render(): \Closure|View
    {
        return function (array $data) {
            $attributes = $this->getAttributesFromData($data);

            if ($this->tag === 'a') {
                $attributes['href'] = $this->href;
            } else {
                $attributes['type'] = $attributes->get('type', 'submit');
                $attributes['wire:loading.attr'] = 'disabled';
                $attributes['wire:loading.class'] = $this->disableClass.' loading loading-spinner';
            }

            $data['disabled'] = (bool) $attributes->get('disabled');
            $data['attributes'] = $attributes;

            $this->outline = $attributes->get('outline', false);
            $color = $this->getColorByAttribute($attributes);
            $size = $this->getSizeByAttribute($attributes);

            return view('lazy::btn', $this->mergeData($data, [
                'btn',
                'join' => $attributes->get('group', false),
                'join-item' => $attributes->get('join', false),
                'glass' => $this->glass,
                'btn-active' => $this->active,
                'btn-outline' => $attributes->get('outline', false),
                'btn-dash' => $attributes->get('dash', false),
                'btn-soft' => $attributes->get('soft', false),
                'btn-disabled' => $attributes->get('disabled', false),
                'btn-neutral' => $color === 'neutral',
                'btn-primary' => $color === 'primary',
                'btn-secondary' => $color === 'secondary',
                'btn-accent' => $color === 'accent',
                'btn-info' => $color === 'info',
                'btn-success' => $color === 'success',
                'btn-warning' => $color === 'warning',
                'btn-error' => in_array($color, ['error', 'danger'], true),
                'btn-ghost' => $color === 'ghost',
                'btn-link' => $color === 'link',
                'btn-xl' => $size === 'xl',
                'btn-lg' => $size === 'lg',
                'btn-md' => $size === 'md',
                'btn-sm' => $size === 'sm',
                'btn-xs' => $size === 'xs',
                'btn-wide' => $attributes->get('wide', false),
                'btn-block' => $attributes->get('block', false),
                'btn-circle' => $attributes->get('circle', false),
                'btn-square' => $attributes->get('square', false),
            ], [
                'wide',
                'block',
                'circle',
                'square',
                'group',
                'active',
                'outline',
                'dash',
                'soft',
                'glass',
            ]))->render();
        };
    }
}
