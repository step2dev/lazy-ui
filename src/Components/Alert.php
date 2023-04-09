<?php

namespace Lazyadm\LazyComponent\Components;

use Closure;
use Illuminate\View\ComponentAttributeBag;
use Lazyadm\LazyComponent\LazyComponent;

class Alert extends LazyComponent
{
    protected array $colors = [
        'default' => '',
        'info'    => 'alert-info',
        'success' => 'alert-success',
        'warning' => 'alert-warning',
        'danger'  => 'alert-error',
        'error'   => 'alert-error',
    ];

    protected function mergeData(array $data): array
    {
        /** @var ComponentAttributeBag $attributes */
        $attributes = $data['attributes'];

        $attributes = $this->mergeClasses($attributes, []);

        $attributes['disabled'] = (bool) $attributes->get('disabled');
        $keys = array_keys($this->colors);

        $attributes['type'] = $this->findModifier($attributes, array_combine($keys, $keys));
        $data['attributes'] = $attributes->except($this->smartAttributes);

        return $data;
    }

    public function render(): Closure
    {
        return function (array $data) {
            return view('lazy::alert', $this->mergeData($data))->render();
        };
    }
}
