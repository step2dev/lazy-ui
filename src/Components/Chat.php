<?php

namespace Step2dev\LazyUI\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Step2dev\LazyUI\LazyComponent;

class Chat extends LazyComponent
{
    public function __construct(
        public string $message = '',
        public string $name = '',
        public string $avatar = '',
        public string $time = '',
        public string $position = 'start'
    ) {}

    public function render(): Closure|View
    {
        return function (array $data) {
            $attributes = $this->getAttributesFromData($data);
            $position = $this->position;

            if ($attributes->has('left')) {
                $position = 'left';
            } elseif ($attributes->has('right')) {
                $position = 'right';
            } elseif ($attributes->has('start')) {
                $position = 'start';
            } elseif ($attributes->has('end')) {
                $position = 'end';
            }

            $color = $this->getColorByAttribute($attributes);

            return view('lazy::chat', $this->mergeData($data, [
                'chat',
                'chat-start' => in_array($position, ['left', 'start'], true),
                'chat-end' => in_array($position, ['right', 'end'], true),
                'chat-bubble-primary' => $color === 'primary',
                'chat-bubble-secondary' => $color === 'secondary',
                'chat-bubble-accent' => $color === 'accent',
                'chat-bubble-info' => $color === 'info',
                'chat-bubble-success' => $color === 'success',
                'chat-bubble-warning' => $color === 'warning',
                'chat-bubble-error' => $color === 'error',
            ], [
                'left',
                'right',
                'start',
                'end',
                'color',
            ]))->render();
        };
    }
}
