<?php

namespace Lazyadm\LazyComponent\Components;

use Illuminate\Contracts\View\View;
use Lazyadm\LazyComponent\LazyComponent;

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

            $this->type = $tabType = $this->getKeyByAttribute($attributes, $this->allowedTabType(), 'type', '');

            if ($this->type === 'boxed') {
                $this->type = '';
            }

            return view('lazy::tabs', $this->mergeData($data, [
                'tabs',
                'tabs-boxed' => $tabType === 'boxed',
            ]))->render();
        };
    }
}
