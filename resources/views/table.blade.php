@props([
    'zebra' => false,
    'pinRows' => false,
    'pinCols' => false,
    'size' => '',
    'unstyled' => false,
])

<table {{ $attributes->class([
    'table' => ! $unstyled,
    'table-zebra' => ! $unstyled && $zebra,
    'table-pin-rows' => ! $unstyled && $pinRows,
    'table-pin-cols' => ! $unstyled && $pinCols,
    'table-xs' => ! $unstyled && $size === 'xs',
    'table-sm' => ! $unstyled && $size === 'sm',
    'table-md' => ! $unstyled && $size === 'md',
    'table-lg' => ! $unstyled && $size === 'lg',
    'table-xl' => ! $unstyled && $size === 'xl',
]) }}>
    {{ $slot }}
</table>
