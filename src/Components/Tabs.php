<?php

namespace Step2dev\LazyUI\Components;

use Illuminate\Contracts\View\View;
use Step2dev\LazyUI\LazyComponent;

class Tabs extends LazyComponent
{
    public function __construct(public string $type = '', public string $size = '')
    {
    }

    public function allowedTabType(): array
    {
        return [
            'boxed',
            'lifted',
            'bordered',
        ];
    }

    public function render(): \Closure|View
    {
        return function (array $data) {
            $attributes = $this->getAttributesFromData($data);

            $this->type = $this->getKeyByAttribute($attributes, $this->allowedTabType(), 'type', '');

            return view('lazy::tabs', $this->mergeData($data, [
                'tabs',
                'tabs-boxed' => $this->type === 'boxed',
            ]))->render();
        };
    }
}
