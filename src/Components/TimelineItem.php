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

    protected function viewClasses(): array
    {
        return [
            'start' => ['timeline-start', 'timeline-box' => $this->box],
            'middle' => 'timeline-middle',
            'end' => ['timeline-end', 'timeline-box' => $this->box],
        ];
    }
}
