@props([
    'shape' => 'squircle',
    'unstyled' => false,
])

<div {{ $attributes->class([
    'mask' => ! $unstyled,
    'mask-squircle' => ! $unstyled && $shape === 'squircle',
    'mask-heart' => ! $unstyled && $shape === 'heart',
    'mask-hexagon' => ! $unstyled && $shape === 'hexagon',
    'mask-hexagon-2' => ! $unstyled && $shape === 'hexagon-2',
    'mask-decagon' => ! $unstyled && $shape === 'decagon',
    'mask-pentagon' => ! $unstyled && $shape === 'pentagon',
    'mask-diamond' => ! $unstyled && $shape === 'diamond',
    'mask-circle' => ! $unstyled && $shape === 'circle',
    'mask-star' => ! $unstyled && $shape === 'star',
    'mask-star-2' => ! $unstyled && $shape === 'star-2',
    'mask-triangle' => ! $unstyled && $shape === 'triangle',
    'mask-triangle-2' => ! $unstyled && $shape === 'triangle-2',
    'mask-triangle-3' => ! $unstyled && $shape === 'triangle-3',
    'mask-triangle-4' => ! $unstyled && $shape === 'triangle-4',
    'mask-square' => ! $unstyled && $shape === 'square',
    'mask-parallelogram' => ! $unstyled && $shape === 'parallelogram',
    'mask-parallelogram-2' => ! $unstyled && $shape === 'parallelogram-2',
    'mask-parallelogram-3' => ! $unstyled && $shape === 'parallelogram-3',
    'mask-parallelogram-4' => ! $unstyled && $shape === 'parallelogram-4',
]) }}>
    {{ $slot }}
</div>
