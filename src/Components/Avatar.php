<?php

namespace Lazyadm\LazyComponent\Components;

use Illuminate\Contracts\View\View;
use Lazyadm\LazyComponent\LazyComponent;

class Avatar extends LazyComponent
{
    protected array $sizes = [
        self::DEFAULT => '',
        'lg'          => 'w-24',
        'md'          => 'w-20',
        'sm'          => 'w-16',
        'xs'          => 'w-12',
    ];

    protected array $smartAttributes = [
        'online',
        'offline',
        'placeholder',
    ];

    protected string $onlineClass = 'online';
    protected string $offlineClass = 'offline';
    protected string $placeholderClass = 'placeholder';

    public function render(): \Closure|View
    {
        return function (array $data) {
            return view('lazy::avatar', $this->mergeData($data))->render();
        };
    }
}
