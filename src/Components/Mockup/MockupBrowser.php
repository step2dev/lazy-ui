<?php

namespace Lazyadm\LazyComponent\Components\Mockup;

use Illuminate\Contracts\View\View;
use Lazyadm\LazyComponent\LazyComponent;

class MockupBrowser extends LazyComponent
{
    public function render(): \Closure|View
    {
        return function (array $data) {
            return view('lazy::mockup.browser', $this->mergeData($data))->render();
        };
    }
}
