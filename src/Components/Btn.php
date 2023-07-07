<?php

namespace Lazyadm\LazyComponent\Components;

use Illuminate\Contracts\View\View;
use Illuminate\View\ComponentAttributeBag;
use Lazyadm\LazyComponent\LazyComponent;

class Btn extends LazyComponent
{
    protected array $colors = [
        'default' => '',
        'primary' => 'btn-primary',
        'accent' => 'btn-accent',
        'info' => 'btn-info',
        'success' => 'btn-success',
        'warning' => 'btn-warning',
        'danger' => 'btn-error',
        'error' => 'btn-error',
        'ghost' => 'btn-ghost',
        'link' => 'btn-link',
    ];

    protected string $outlineClass = 'btn-outline';

    protected string $activeClass = 'btn-active';

    protected string $disableClass = 'btn-disabled';

    protected string $glassClass = 'glass';

    protected string $loadingClass = 'loading';

    protected array $sizes = [
        'default' => '',
        'lg' => 'btn-lg',
        'md' => 'btn-md',
        'sm' => 'btn-sm',
        'xs' => 'btn-xs',
        'wide' => 'btn-wide',
        'block' => 'btn-block',
        'circle' => 'btn-circle',
        'square' => 'btn-square',
    ];

    public bool $outline = false;

    public string $tag;

    public function __construct(
        public bool $rounded = false,
        public bool $squared = false,
        ?string $label = '',
        public ?string $icon = null,
        public ?string $rightIcon = null,
        public ?string $href = null,
        private ?string $glass = null,
        private ?string $active = null
    ) {
        $this->label = $label;
        $this->tag = $this->href === null ? 'button' : 'a';
    }

    protected function mergeData(array $data): array
    {
        /** @var ComponentAttributeBag $attributes */
        $attributes = $data['attributes'];
        if ($this->tag === 'a') {
            $attributes['href'] = $this->href;
        } else {
            $attributes['type'] = 'submit';
            $attributes['wire:loading.attr'] = 'disabled';
            $attributes['wire:loading.class'] = $this->disableClass.' '.$this->loadingClass;
        }

        $attributes = $this->mergeClasses($attributes, [
            'btn',
            'join-item' => $data['attributes']['group'] ?? false,
            $this->outline ? $this->outlineClass : '',
            $this->glass ? $this->glassClass : '',
            $this->active ? $this->activeClass : '',
        ]);
        // $data['iconSize']   = $this->iconSize($attributes);
        $data['disabled'] = (bool) $attributes->get('disabled');
        $data['attributes'] = $attributes->except($this->smartAttributes);
        unset($data['attributes']['group']);

        return $data;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): \Closure|View
    {
        return function (array $data) {
            $attributes = $data['attributes'];
            $this->outline = $attributes->get('outline', false);

            return view('lazy::btn', $this->mergeData($data))->render();
        };
    }
}
