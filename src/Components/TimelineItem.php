<?php

namespace Step2dev\LazyUI\Components;

class TimelineItem extends DaisyComponent
{
    protected const VIEW = 'lazy::timeline-item';

    public function __construct(
        public bool $first = false,
        public bool $last = false,
        public bool $box = false,
    ) {}
}
