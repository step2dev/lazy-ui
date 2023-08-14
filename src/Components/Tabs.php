<?php

namespace Lazyadm\LazyComponent\Components;

use Illuminate\Contracts\View\View;
use Lazyadm\LazyComponent\LazyComponent;

class Tabs extends LazyComponent
{
    public ?string $tabsType = null;

    public function __construct(?string $tabsType = null)
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

            $this->tabsType = $tabType = $this->getKeyByAttribute($attributes, $this->allowedTabType(), 'type');

            if ($this->tabsType === 'boxed') {
                $this->tabsType = null;
            }

            return view('lazy::tabs', $this->mergeData($data, [
                'tabs',
                'tabs-boxed' => $tabType === 'boxed',
            ]))->render();
        };
    }
}
