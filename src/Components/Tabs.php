<?php

namespace Lazyadm\LazyComponent\Components;

use Illuminate\Contracts\View\View;
use Lazyadm\LazyComponent\LazyComponent;

class Tabs extends LazyComponent
{
    private ?string $tabsType = null;

    public function getTabsTypeAllowed(): ?string
    {
        return $this->tabsType;
    }

    public function render(): \Closure|View
    {
        return function (array $data) {
            $attributes = $this->getAttributesFromData($data);

            $this->tabsType = $this->getKeyByAttribute($attributes, (array) 'type', '');

            if ( $this->tabsType  = 'boxed') {
                $this->tabsType = null;
            }

            return view('lazy::tabs', $this->mergeData($data, [
                'tabs',
                'tabs-tabs-boxed' => $this->tabsType === 'bordered',
            ]))->render();
        };
    }
}
