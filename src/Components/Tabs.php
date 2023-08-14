<?php

namespace Lazyadm\LazyComponent\Components;

use Illuminate\Contracts\View\View;
use Lazyadm\LazyComponent\LazyComponent;

class Tabs extends LazyComponent
{
    /**
     * @var true
     */
    public bool $tabsEnable = true;

    public function render(): \Closure|View
    {
        return function (array $data) {
            return view('lazy::tabs', $this->mergeData($data))->render();
        };
    }
}
