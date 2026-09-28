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
        public int $window = 2,
        public string $previousLabel = '«',
        public string $nextLabel = '»',
    ) {
        $last = max(0, $this->total);
        $current = max(1, min(max(1, $last), $this->current));
        $window = max(0, min(10, $this->window));

        if ($last === 0) {
            return;
        }

        if ($this->showEdges) {
            $this->pages[] = $this->pageItem(
                label: $this->previousLabel,
                page: max(1, $current - 1),
                active: false,
                disabled: $current === 1,
            );
        }

        $visible = [];
        for ($page = 1; $page <= $last; $page++) {
            if ($page === 1 || $page === $last || abs($page - $current) <= $window) {
                $visible[] = $page;
            }
        }

        $previous = null;
        foreach ($visible as $page) {
            if ($previous !== null && $page - $previous > 1) {
                $this->pages[] = [
                    'label' => '…',
                    'page' => null,
                    'active' => false,
                    'disabled' => true,
                    'href' => null,
                    'classes' => 'join-item btn btn-disabled',
                ];
            }

            $this->pages[] = $this->pageItem(
                label: (string) $page,
                page: $page,
                active: $page === $current,
            );
            $previous = $page;
        }

        if ($this->showEdges) {
            $this->pages[] = $this->pageItem(
                label: $this->nextLabel,
                page: min($last, $current + 1),
                active: false,
                disabled: $current === $last,
            );
        }
    }

    protected function componentData(array $data, ComponentAttributeBag $attributes): array
    {
        $pages = $this->pages;

        if ($this->truthy($attributes->get('unstyled'))) {
            $pages = array_map(static fn (array $page): array => [
                ...$page,
                'classes' => '',
            ], $pages);
        }

        return ['pages' => $pages];
    }

    protected function componentClasses(array $data, ComponentAttributeBag $attributes): array
    {
        return ['join'];
    }

    private function pageItem(
        string $label,
        int $page,
        bool $active = false,
        bool $disabled = false,
    ): array {
        return [
            'label' => $label,
            'page' => $page,
            'active' => $active,
            'disabled' => $disabled,
            'href' => ! $disabled && $this->url
                ? str_replace('{page}', (string) $page, $this->url)
                : null,
            'classes' => $this->classes([
                'join-item',
                'btn',
                'btn-active' => $active,
                'btn-disabled' => $disabled,
            ]),
        ];
    }
}
