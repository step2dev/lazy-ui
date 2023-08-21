<?php

namespace Step2dev\LazyUI\Components\Mockup;

use Illuminate\Contracts\View\View;
use Step2dev\LazyUI\LazyComponent;

class MockupCode extends LazyComponent
{
    public function render(): \Closure|View
    {
        return function (array $data) {
            return view('lazy::mockup.code', $this->mergeData($data))->render();
        };
    }
}
