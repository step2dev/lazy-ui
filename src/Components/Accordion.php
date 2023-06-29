<?php

namespace Lazyadm\LazyComponent\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Lazyadm\LazyComponent\LazyComponent;

class Accordion extends LazyComponent
{
    protected string $type = '';

    protected array $types = [
        '' => '',
        'none' => '',
        'arrow' => 'collapse-arrow',
        'plus' => 'collapse-plus',
    ];

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): Closure|View
    {
        return function (array $data) {
            return view('lazy::accordion', $this->mergeData($data))->render();
        };
    }

    public function mergeData(array $data): array
    {
        $attributes = $data['attributes'];
        $attributes['title'] ??= $attributes['label'] ?? null;
        $attributes['active'] ??= false;
        $attributes['name'] ??= 'accordion';

        if (($attributes['type'] ?? '') && array_key_exists($attributes['type'], $this->types)) {
            $class = explode(' ', $attributes['class']);

            if (isset($this->types[$attributes['type']])) {
                $class[] = $this->types[$attributes['type']];
                unset($attributes['type']);
            }

            $attributes['class'] = implode(' ', array_filter(array_unique($class)));
        } else {
            $attributes['class'] = $this->types['plus'];
        }

        $data['attributes'] = $attributes;

        return parent::mergeData($data);
    }
}
