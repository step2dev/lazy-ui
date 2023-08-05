<?php

namespace Lazyadm\LazyComponent\Components\Mockup;

use Illuminate\Contracts\View\View;
use Lazyadm\LazyComponent\LazyComponent;

class MockupPhone extends LazyComponent
{
    public function render(): \Closure|View
    {
        return function (array $data) {
            return view('lazy::mockup.phone', $this->mergeData($data))->render();
        };
    }
}
