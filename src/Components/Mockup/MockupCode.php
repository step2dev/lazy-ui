<?php

namespace Lazyadm\LazyComponent\Components\Mockup;

use Illuminate\Contracts\View\View;
use Lazyadm\LazyComponent\LazyComponent;

class MockupCode extends LazyComponent
{
    public function render(): \Closure|View
    {
        return function (array $data) {
            return view('lazy::mockup.code', $this->mergeData($data))->render();
        };
    }
}
