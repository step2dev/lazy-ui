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
    )
    {
    }

    public function render(): Closure|View
    {
        return function (array $data) {
            $position = $this->position ?? $this->getKeyByAttribute($data['attributes'], [
                'left',
                'right',
                'start',
                'end',
            ], 'start');

            return view('lazy::chat', $this->mergeData($data, [
                'chat',
                'chat-start' => in_array($position, ['left', 'start']),
                'chat-end' => in_array($position, ['right', 'end']),
            ]))->render();
        };
    }
}
