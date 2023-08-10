<?php

namespace Lazyadm\LazyComponent\Components;

use Illuminate\Contracts\View\View;
use Lazyadm\LazyComponent\LazyComponent;

class Avatar extends LazyComponent
{
    public function render(): \Closure|View
    {
        return function (array $data) {
            $attributes = $this->getAttributesFromData($data);

            $size = $this->getSizeByAttribute($attributes);

            return view('lazy::avatar', $this->mergeData($data, [
                'w-24' => $size === 'lg',
                'w-20' => $size === 'md',
                'w-16' => $size === 'sm',
                'w-12' => $size === 'xs',
                'online' => $attributes->get('online', false),
                'offline' => $attributes->get('offline', false),
                'placeholder' => $attributes->get('placeholder', false),
            ], [
                'online',
                'offline',
                'placeholder',
            ]))->render();
        };
    }
}
