<?php

namespace Lazyadm\LazyComponent\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Lazyadm\LazyComponent\LazyComponent;

class Chat extends LazyComponent
{
    public function __construct(protected string $avatar, protected string $name, protected string $time, protected string $message, protected string $position = 'start')
    {
    }

    public function mergeData(array $data, array $classes = []): array
    {
        $attributes = $data['attributes'];
        $classes = [...$classes, 'chat'];
        $position = $attributes['position'] ?? $this->findBySmartAttribute($attributes,[
            'left',
            'right',
            'start',
            'end',
        ], 'start');

        if (in_array($position, ['left', 'start'])) {
            $classes[] = 'chat-start';
        }

        if (in_array($position, ['right', 'end'])) {
            $classes[] = 'chat-end';
        }

        unset($attributes['left'], $attributes['right'], $attributes['start'], $attributes['end'], $attributes['position']);

        $data['attributes'] = $attributes;

        return parent::mergeData($data, $classes);
    }

    public function render(): Closure|View
    {
        return function (array $data) {
            return view('lazy::chat', $this->mergeData($data))->render();
        };
    }
}
