<?php

namespace Step2dev\LazyUI\Components;

class Rating extends DaisyComponent
{
    protected const VIEW = 'lazy::rating';

    public function __construct(
        public string $name = 'rating',
        public int $items = 5,
        public int|float|null $value = null,
        public string $mask = 'star-2',
        public ?string $type = null,
        public string $color = '',
        public string $size = '',
        public bool $half = false,
        public bool $clearable = false,
        public bool $readonly = false,
    ) {}
}
