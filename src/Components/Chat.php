<?php

namespace Lazyadm\LazyComponent\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Lazyadm\LazyComponent\LazyComponent;

class Chat extends LazyComponent
{
    public function __construct(
        public string $message,
        public string $name = '',
        public string $avatar = '',
        public string $time = '',
        public string $position = 'start'
    ) {
    }

    public function render(): Closure|View
    {
        return function (array $data) {
            $attributes = $this->getAttributesFromData($data);
            $position = $this->position ?? $this->getKeyByAttribute($data['attributes'], [
                'left',
                'right',
                'start',
                'end',
            ], 'start');

            $color = $this->getColorByAttribute($attributes);

            return view('lazy::chat', $this->mergeData($data, [
                'chat',
                'chat-start' => in_array($position, ['left', 'start']),
                'chat-end' => in_array($position, ['right', 'end']),
                'chat-bubble-primary' => $color === 'primary',
                'chat-bubble-secondary' => $color === 'secondary',
                'chat-bubble-accent' => $color === 'accent',
                'chat-bubble-info' => $color === 'info',
                'chat-bubble-success' => $color === 'success',
                'chat-bubble-warning' => $color === 'warning',
                'chat-bubble-error' => $color === 'error',

            ]))->render();
        };
    }
}
