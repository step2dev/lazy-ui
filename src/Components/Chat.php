<?php

namespace Lazyadm\LazyComponent\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Lazyadm\LazyComponent\LazyComponent;

class Chat extends LazyComponent
{
    public function __construct(public string $message, public string $name = '', public string $avatar = '', public string $time = '', public string $position = 'start')
    {
    }

    public function mergeData(array $data, array $classes = []): array
    {
        $attributes = $data['attributes'];

        $position = $this->position ?? $this->getKeyByAttribute($attributes, [
            'left',
            'right',
            'start',
            'end',
        ], 'start');

        $classes = [
            ...$classes,
            ...[
                'chat',
                'chat-start' => in_array($position, ['left', 'start']),
                'chat-end'   => in_array($position, ['right', 'end']),
            ]
        ];

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
