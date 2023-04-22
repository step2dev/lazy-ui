<?php

namespace Lazyadm\LazyComponent\Components\Native;

use Illuminate\Contracts\View\View;
use Lazyadm\LazyComponent\LazyComponent;

class NativeTextarea extends LazyComponent
{
    protected array $colors = [
        'default' => '',
        'bordered' => 'textarea-bordered',
        'ghost' => 'textarea-ghost',
        'primary' => 'textarea-primary',
        'secondary' => 'textarea-secondary',
        'accent' => 'textarea-accent',
        'info' => 'textarea-info',
        'success' => 'textarea-success',
        'warning' => 'textarea-warning',
        'error' => 'textarea-error',
    ];

    protected array $sizes = [
        'default' => '',
        'lg' => 'toggle-lg',
        'md' => 'toggle-md',
        'sm' => 'toggle-sm',
        'xs' => 'toggle-xs',
    ];

    public ?string $placeholder;

    public function __construct(string $placeholder = '', public bool $required = false)
    {
        $this->placeholder = (string) str($placeholder)->trim()->ucfirst();
    }

    public function render(): \Closure|View
    {
        return function (array $data) {
            $data['attributes']['required'] = $this->required;

            return view('lazy::textarea', $this->mergeData($data))->render();
        };
    }
}
