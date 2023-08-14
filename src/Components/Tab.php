<?php

namespace Lazyadm\LazyComponent\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Lazyadm\LazyComponent\LazyComponent;

class Tab extends LazyComponent
{
    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure
    {
        return function (array $data) {
            $attributes = $this->attributes->getAttributes();

            $type = $this->getAttributesFromData($data);
            $size = $this->getAttributesFromData($data, 'size');

            return view('lazy::tab', $this->mergeData($data, [
                'tab',
                'tab-active' => $attributes['active'] ?? false,
                'tab-bordered' => $type == 'bordered',
                'tab-lifted' => $type == 'lifted',

                'tab-sm' => $size == 'sm',
                'tab-md' => $size == 'md',
                'tab-lg' => $size == 'lg',
                'tab-xl' => $size == 'xl',
            ]))->render();
        };
    }
}
