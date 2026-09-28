<?php

namespace Step2dev\LazyUI\Components;

use Illuminate\View\ComponentAttributeBag;

class Table extends DaisyComponent
{
    protected const VIEW = 'lazy::table';

    public array $headers;

    public array $rows;

    public function __construct(
        array $headers = [],
        array $rows = [],
        public bool $zebra = false,
        public bool $pinRows = false,
        public bool $pinCols = false,
        public string $size = '',
    ) {
        $this->headers = array_values($headers);
        $this->rows = array_values($rows);
    }

    protected function componentClasses(array $data, ComponentAttributeBag $attributes): array
    {
        return [
            'table',
            'table-zebra' => $this->zebra,
            'table-pin-rows' => $this->pinRows,
            'table-pin-cols' => $this->pinCols,
            'table-xs' => $this->size === 'xs',
            'table-sm' => $this->size === 'sm',
            'table-md' => $this->size === 'md',
            'table-lg' => $this->size === 'lg',
            'table-xl' => $this->size === 'xl',
        ];
    }
}
