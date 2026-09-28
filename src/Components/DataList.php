<?php

namespace Step2dev\LazyUI\Components;

use Illuminate\View\ComponentAttributeBag;

class DataList extends DaisyComponent
{
    protected const VIEW = 'lazy::list';

    public array $rows = [];

    public function __construct(array $items = [])
    {
        foreach (array_values($items) as $item) {
            $this->rows[] = $this->normalizeRow($item);
        }
    }

    protected function componentData(array $data, ComponentAttributeBag $attributes): array
    {
        $rows = $this->rows;

        if ($this->truthy($attributes->get('unstyled'))) {
            $rows = array_map(static fn (array $row): array => [
                ...$row,
                'classes' => '',
            ], $rows);
        }

        return ['rows' => $rows];
    }

    protected function componentClasses(array $data, ComponentAttributeBag $attributes): array
    {
        return ['list'];
    }

    private function normalizeRow(mixed $item): array
    {
        if (! is_array($item)) {
            return [
                'cells' => [(string) $item],
                'classes' => 'list-row',
            ];
        }

        $classes = $this->classes([
            'list-row',
            (string) ($item['class'] ?? '') => isset($item['class']),
        ]);

        if (isset($item['cells']) && is_array($item['cells'])) {
            return [
                'cells' => array_values($item['cells']),
                'classes' => $classes,
            ];
        }

        $semantic = [];
        foreach (['media', 'title', 'subtitle', 'description', 'content', 'actions'] as $key) {
            if (array_key_exists($key, $item)) {
                $semantic[] = $item[$key];
            }
        }

        return [
            'cells' => $semantic !== [] ? $semantic : array_values($item),
            'classes' => $classes,
        ];
    }
}
