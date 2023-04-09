<?php

namespace Lazyadm\LazyComponent\Components\Form;

use Illuminate\Contracts\View\View;
use Lazyadm\LazyComponent\Components\Checkbox;

class FormToggle extends Checkbox
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
