<?php

namespace Lazyadm\LazyComponent\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\ComponentAttributeBag;
use Lazyadm\LazyComponent\LazyComponent;

class Join extends LazyComponent
{
    protected string $position = '';

    protected array $positions = [
        '' => '',
        'none' => '',
        'vertical' => 'join-vertical',
        'horizontal' => 'join-horizontal',
    ];


    protected function mergeClasses(ComponentAttributeBag $attributes, array $merge = []): ComponentAttributeBag
    {
        return $attributes->class(array_filter([
            ...$merge,
            $this->size($attributes),
            $this->color($attributes),
            $this->position($attributes),
        ]));
    }

    public function position(ComponentAttributeBag $attributes): string
    {
        return $this->modifierClasses($attributes, $this->positions);
    }


    public function mergeData(array $data): array
    {
        $attributes = $data['attributes'];

        if (array_key_exists($attributes['position'] ?? '', $this->positions)) {
            $class = explode(' ', $attributes['class']);

            if (isset($this->positions[$attributes['position']])) {
                $class[] = $this->positions[$attributes['position']];
                unset($attributes['position']);
            }

            $attributes['class'] = implode(' ', array_filter(array_unique($class)));
        }

        $data['attributes'] = $attributes;

        return parent::mergeData($data);
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): Closure|View
    {
        return function (array $data) {
            return view('lazy::join', $this->mergeData($data))->render();
        };
    }

}
