<?php

namespace Lazyadm\LazyComponent\Components;

use Illuminate\Contracts\View\View;
use Lazyadm\LazyComponent\LazyComponent;

class Breadcrumbs extends LazyComponent
{

    public function render(): \Closure|View
    {
        return function (array $data) {
            return view('lazy::breadcrumbs', $this->mergeData($data, [
                'text-sm breadcrumbs',
            ]))->render();
        };
    }
}
