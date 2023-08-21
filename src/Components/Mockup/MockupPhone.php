<?php

namespace Step2dev\LazyUI\Components\Mockup;

use Illuminate\Contracts\View\View;
use Step2dev\LazyUI\LazyComponent;

class MockupPhone extends LazyComponent
{
    public function render(): \Closure|View
    {
        return function (array $data) {
            return view('lazy::mockup.phone', $this->mergeData($data, [
                'mockup-phone',
                'border-primary' => $data['primary'] ?? false,
            ]))->render();
        };
    }
}
