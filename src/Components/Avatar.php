<?php

namespace Step2dev\LazyUI\Components;

use Illuminate\Contracts\View\View;
use Step2dev\LazyUI\LazyComponent;

class Avatar extends LazyComponent
{
    public function render(): \Closure|View
    {
        return function (array $data) {
            $attributes = $this->getAttributesFromData($data);
            $size = $this->getSizeByAttribute($attributes);

            $data['onlineEnabled'] = $attributes->get('online', false);
            $data['offlineEnabled'] = $attributes->get('offline', false);
            $data['placeholderEnabled'] = $attributes->get('placeholder', false);

            return view('lazy::avatar', $this->mergeData($data, [
                'w-24' => $size === 'lg',
                'w-20' => $size === 'md',
                'w-16' => $size === 'sm',
                'w-12' => $size === 'xs',
            ], [
                'online',
                'offline',
                'placeholder',
                'size',
            ]))->render();
        };
    }
}
