<?php

namespace Step2dev\LazyUI\Components;

use Illuminate\Contracts\View\View;
use Step2dev\LazyUI\LazyComponent;

class Kbd extends LazyComponent
{
    public function render(): \Closure|View
    {
        return function (array $data) {
            $attributes = $this->getAttributesFromData($data);
            $size = $this->getSizeByAttribute($attributes, '');

            return view('lazy::kbd', $this->mergeData($data, [
                'kbd',
                'kbd-lg' => $size === 'lg',
                'kbd-md' => $size === 'md',
                'kbd-sm' => $size === 'sm',
                'kbd-xs' => $size === 'xs',
            ]))->render();
        };
    }
}
