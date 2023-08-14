<?php

namespace Lazyadm\LazyComponent\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Lazyadm\LazyComponent\LazyComponent;

class Join extends LazyComponent
{
    public bool $join = true;

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): Closure|View
    {
        return function (array $data) {
            $attributes = $this->getAttributesFromData($data);

            $position = $this->getPositionByAttribute($attributes);

            return view('lazy::join', $this->mergeData($data, [
                'join',
                'join-vertical' => $position === 'vertical',
                'join-horizontal' => $position === 'horizontal',
            ]))->render();
        };
    }
}
