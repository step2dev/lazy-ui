<?php

namespace Step2dev\LazyUI\Components;

use Illuminate\Contracts\View\View;
use Step2dev\LazyUI\LazyComponent;

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
