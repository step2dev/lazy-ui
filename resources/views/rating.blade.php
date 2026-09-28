@props([
    'name' => 'rating',
    'items' => 5,
    'value' => null,
    'mask' => 'star-2',
    'color' => '',
    'size' => '',
    'half' => false,
    'unstyled' => false,
])

@php
    $maskClass = match ($mask) {
        'heart' => 'mask-heart',
        'star' => 'mask-star',
        default => 'mask-star-2',
    };

    $colorClass = match ($color) {
        'primary' => 'bg-primary',
        'secondary' => 'bg-secondary',
        'accent' => 'bg-accent',
        'success' => 'bg-success',
        'info' => 'bg-info',
        'warning' => 'bg-warning',
        'error' => 'bg-error',
        default => '',
    };
@endphp

<div {{ $attributes->class([
    'rating' => ! $unstyled,
    'rating-half' => ! $unstyled && $half,
    'rating-xs' => ! $unstyled && $size === 'xs',
    'rating-sm' => ! $unstyled && $size === 'sm',
    'rating-md' => ! $unstyled && $size === 'md',
    'rating-lg' => ! $unstyled && $size === 'lg',
    'rating-xl' => ! $unstyled && $size === 'xl',
]) }}>
    @if ($half)
        <input type="radio" name="{{ $name }}" value="0" @class(['rating-hidden' => ! $unstyled]) @checked((float) $value === 0.0) />

        @for ($index = 1; $index <= $items * 2; $index++)
            <input
                type="radio"
                name="{{ $name }}"
                value="{{ $index / 2 }}"
                @checked((float) $value === $index / 2)
                @class([
                    'mask' => ! $unstyled,
                    $maskClass => ! $unstyled,
                    $colorClass => ! $unstyled && $colorClass,
                    'mask-half-1' => ! $unstyled && $index % 2 === 1,
                    'mask-half-2' => ! $unstyled && $index % 2 === 0,
                ])
            />
        @endfor
    @else
        @for ($index = 1; $index <= $items; $index++)
            <input
                type="radio"
                name="{{ $name }}"
                value="{{ $index }}"
                @checked((float) $value === (float) $index)
                @class([
                    'mask' => ! $unstyled,
                    $maskClass => ! $unstyled,
                    $colorClass => ! $unstyled && $colorClass,
                ])
            />
        @endfor
    @endif
</div>
