<?php

namespace Step2dev\LazyUI\Components;

use Illuminate\View\ComponentAttributeBag;

class Table extends DaisyComponent
{
    protected const VIEW = 'lazy::table';

    public array $headerItems = [];

    public array $rowItems = [];

    public function __construct(
        array $headers = [],
        array $rows = [],
        public bool $zebra = false,
        public bool $pinRows = false,
        public bool $pinCols = false,
        public string $size = '',
    ) {
        $keys = [];

        foreach ($headers as $key => $header) {
            $normalized = is_array($header) ? $header : ['label' => $header];
            $resolvedKey = (string) ($normalized['key'] ?? (is_string($key) ? $key : $key));

            $keys[] = $resolvedKey;
            $this->headerItems[] = [
                'label' => (string) ($normalized['label'] ?? $normalized['title'] ?? $resolvedKey),
                'key' => $resolvedKey,
                'classes' => (string) ($normalized['class'] ?? ''),
            ];
        }

        foreach ($rows as $row) {
            $normalizedRow = is_array($row) ? $row : [$row];
            $cells = [];

            if ($this->headerItems !== []) {
                foreach ($keys as $index => $key) {
                    $value = array_key_exists($key, $normalizedRow)
                        ? $normalizedRow[$key]
                        : ($normalizedRow[$index] ?? null);

                    $cells[] = $this->normalizeCell($value);
                }
            } else {
                foreach (array_values($normalizedRow) as $value) {
                    $cells[] = $this->normalizeCell($value);
                }
            }

            $this->rowItems[] = [
                'cells' => $cells,
                'classes' => is_array($row) ? (string) ($row['_class'] ?? '') : '',
            ];
        }
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

    private function normalizeCell(mixed $cell): array
    {
        if (! is_array($cell)) {
            return ['value' => $cell, 'classes' => ''];
        }

        return [
            'value' => $cell['value'] ?? $cell['label'] ?? '',
            'classes' => (string) ($cell['class'] ?? ''),
        ];
    }
}
