<?php

namespace Lazyadm\LazyComponent\Components;

use Illuminate\Contracts\View\View;
use Lazyadm\LazyComponent\LazyComponent;

class Input extends LazyComponent
{
    protected array $colors = [
        'default' => 'input-bordered',
        'primary' => 'input-primary',
        'secondary' => 'input-secondary',
        'accent' => 'input-accent',
        'ghost' => 'input-ghost',
        'info' => 'input-info',
        'success' => 'input-success',
        'warning' => 'input-warning',
        'error' => 'input-error',
        'danger' => 'input-error',
    ];

    protected array $sizes = [
        'default' => '',
        'lg' => 'input-lg',
        'md' => 'input-md',
        'sm' => 'input-sm',
        'xs' => 'input-xs',
    ];

    public ?string $placeholder;

    public function __construct(public string $label = '', string $placeholder = '', public bool $required = false)
    {
        $this->placeholder = (string) str($placeholder ?: $this->label)->trim()->ucfirst();
    }

    public function render(): \Closure|View
    {
        return function (array $data) {
            $data['attributes']['required'] = $this->required;

            return view('lazy::input', $this->mergeData($data))->render();
        };
    }
}
