<?php

namespace Lazyadm\LazyComponent\Components;

use Illuminate\Contracts\View\View;
use Lazyadm\LazyComponent\LazyComponent;

class Badge extends LazyComponent
{
    protected string $outlineClass = 'badge-outline';

    public bool $outline = false;

    public function __construct(?string $label = '')
    {
        $this->label = $label;
    }

    protected array $colors = [
        'default' => '',
        'primary' => 'badge-primary',
        'secondary' => 'badge-secondary',
        'accent' => 'badge-accent',
        'ghost' => 'badge-ghost',
        'info' => 'badge-info',
        'success' => 'badge-success',
        'warning' => 'badge-warning',
        'error' => 'badge-error',
        'danger' => 'badge-error',
    ];

    protected array $sizes = [
        'default' => '',
        'lg' => 'badge-lg',
        'md' => 'badge-md',
        'sm' => 'badge-sm',
        'xs' => 'badge-xs',
    ];

    public function render(): \Closure|View
    {
        return function (array $data) {
            $attributes = $this->getAttributesFromData($data);

            return view('lazy::badge', $this->mergeData($data, [
                'badge-outline' => $attributes->get('outline'),
            ]))->render();
        };
    }
}
