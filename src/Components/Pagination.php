<?php

namespace Step2dev\LazyUI\Components;

use Illuminate\View\ComponentAttributeBag;

class Pagination extends DaisyComponent
{
    protected const VIEW = 'lazy::pagination';

    public array $pages = [];

    public function __construct(
        public int $current = 1,
        public int $total = 0,
        public ?string $url = null,
        public bool $showEdges = true,
    ) {
        $last = max(0, $this->total);
        $current = max(1, min(max(1, $last), $this->current));

        for ($page = 1; $page <= $last; $page++) {
            $this->pages[] = [
                'label' => (string) $page,
                'page' => $page,
                'active' => $page === $current,
                'href' => $this->url ? str_replace('{page}', (string) $page, $this->url) : null,
            ];
        }
    }

    protected function componentClasses(array $data, ComponentAttributeBag $attributes): array
    {
        return ['join'];
    }
}
