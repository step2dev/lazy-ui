<?php

namespace Lazyadm\LazyComponent\Components;

use Illuminate\Contracts\View\View;
use Lazyadm\LazyComponent\LazyComponent;

class Btn extends LazyComponent
{
    protected string $disableClass = 'btn-disabled';

    protected string $loadingClass = 'loading';

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
        private ?string $active = null
    ) {
        $this->tag = $this->href === null ? 'button' : 'a';
    }

    public function allowedColors(): array
    {
        return [
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

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): \Closure|View
    {
        return function (array $data) {
            $attributes = $this->getAttributesFromData($data);
            if ($this->tag === 'a') {
                $attributes['href'] = $this->href;
            } else {
                $attributes['type'] = 'submit';
                $attributes['wire:loading.attr'] = 'disabled';
                $attributes['wire:loading.class'] = $this->disableClass.' '.$this->loadingClass;
            }

            // $data['iconSize']   = $this->iconSize($attributes);
            $data['disabled'] = (bool) $attributes->get('disabled');

            $data['attributes'] = $attributes;

            $this->outline = $attributes->get('outline', false);
            $color = $this->getColorByAttribute($attributes);
            $size = $this->getSizeByAttribute($attributes);

            return view('lazy::btn', $this->mergeData($data, [
                'btn',
                'join-item' => $attributes->get('group', false),
                'mr-2' => ! $attributes->get('group', false),
                'glass' => $this->glass,
                'btn-active' => $this->active,
                'btn-outline' => $attributes->get('outline', false),
                'btn-disabled' => $attributes->get('disabled', false),
                // colors
                'btn-primary' => $color === 'primary',
                'btn-secondary' => $color === 'secondary',
                'btn-accent' => $color === 'accent',
                'btn-info' => $color === 'info',
                'btn-success' => $color === 'success',
                'btn-warning' => $color === 'warning',
                'btn-error' => $color === 'error',
                'btn-ghost' => $color === 'ghost',
                'btn-link' => $color === 'link',
                // sizes
                'btn-lg' => $size === 'lg',
                'btn-md' => $size === 'md',
                'btn-sm' => $size === 'sm',
                'btn-xs' => $size === 'xs',
                // other
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
                'glass',
            ]))->render();
        };
    }
}
