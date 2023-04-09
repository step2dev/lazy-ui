<?php

namespace Lazyadm\LazyComponent\Components;

use Illuminate\Contracts\View\View;

class Toggle extends Checkbox
{
    protected array $colors = [
        'default' => '',
        'primary' => 'toggle-primary',
        'secondary' => 'toggle-secondary',
        'accent' => 'toggle-accent',
    ];

    protected array $sizes = [
        'default' => '',
        'lg' => 'toggle-lg',
        'md' => 'toggle-md',
        'sm' => 'toggle-sm',
        'xs' => 'toggle-xs',
    ];

    public function render(): \Closure|View
    {
        return function (array $data) {
            return view('lazy::toggle', $this->mergeData($data))->render();
        };
    }
}
