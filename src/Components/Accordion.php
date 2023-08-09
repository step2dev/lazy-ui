<?php

namespace Lazyadm\LazyComponent\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Lazyadm\LazyComponent\LazyComponent;

class Accordion extends LazyComponent
{
    /**
     * Get the view / contents that represent the component.
     */
    public function render(): Closure|View
    {
        return function (array $data) {
            $attributes = $this->getAttributesFromData($data);

            $attributes['title'] ??= $attributes['label'] ?? null;
            $attributes['active'] ??= false;
            $attributes['name'] ??= 'accordion';

            $data['attributes'] = $attributes;

            return view('lazy::accordion', $this->mergeData($data, [
                'collapse',
                'bg-base-200 mb-2',
                'collapse-arrow' => $attributes->get('type') === 'arrow',
                'collapse-plus'  => $attributes->get('type') === 'plus' || $attributes->get('type') === null,
            ], [
                'type',
            ]))->render();
        };
    }
}
