@props([
    'name' => 'rating',
    'items' => 5,
    'value' => null,
    'mask' => 'star-2',
    'type' => null,
    'color' => '',
    'size' => '',
    'half' => false,
    'clearable' => false,
    'readonly' => false,
    'unstyled' => false,
])

@php
    $resolvedMask = $type ?: $mask;

    $maskClass = match ($resolvedMask) {
        'heart' => 'mask-heart',
        'star' => 'mask-star',
        'star-2' => 'mask-star-2',
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

    $inputAttributes = $attributes->only([
        'wire:model',
        'wire:model.live',
        'wire:model.blur',
        'wire:model.change',
        'wire:model.lazy',
        'disabled',
        'form',
        'required',
    ]);

    $wrapperAttributes = $attributes->except([
        'wire:model',
        'wire:model.live',
        'wire:model.blur',
        'wire:model.change',
        'wire:model.lazy',
        'disabled',
        'form',
        'required',
    ]);

    $itemCount = max(1, min(100, (int) $items));
@endphp

<div {{ $wrapperAttributes->class([
    'rating' => ! $unstyled,
    'rating-half' => ! $unstyled && $half,
    'rating-xs' => ! $unstyled && $size === 'xs',
    'rating-sm' => ! $unstyled && $size === 'sm',
    'rating-md' => ! $unstyled && $size === 'md',
    'rating-lg' => ! $unstyled && $size === 'lg',
    'rating-xl' => ! $unstyled && $size === 'xl',
]) }}>
    @if ($readonly)
        @for ($index = 1; $index <= $itemCount; $index++)
            <div
                @class([
                    'mask' => ! $unstyled,
                    $maskClass => ! $unstyled,
                    $colorClass => ! $unstyled && $colorClass,
                ])
                aria-label="{{ $index }} {{ $index === 1 ? 'star' : 'stars' }}"
                @if ((float) $value === (float) $index) aria-current="true" @endif
            ></div>
        @endfor
    @elseif ($half)
        @if ($clearable)
            <input
                type="radio"
                name="{{ $name }}"
                value="0"
                aria-label="clear"
                @class(['rating-hidden' => ! $unstyled])
                @checked((float) $value === 0.0)
                {{ $inputAttributes }}
            />
        @endif

        @for ($index = 1; $index <= $itemCount * 2; $index++)
            @php($ratingValue = $index / 2)
            <input
                type="radio"
                name="{{ $name }}"
                value="{{ $ratingValue }}"
                aria-label="{{ $ratingValue }} {{ $ratingValue == 1 ? 'star' : 'stars' }}"
                @checked((float) $value === $ratingValue)
                @class([
                    'mask' => ! $unstyled,
                    $maskClass => ! $unstyled,
                    $colorClass => ! $unstyled && $colorClass,
                    'mask-half-1' => ! $unstyled && $index % 2 === 1,
                    'mask-half-2' => ! $unstyled && $index % 2 === 0,
                ])
                {{ $inputAttributes }}
            />
        @endfor
    @else
        @if ($clearable)
            <input
                type="radio"
                name="{{ $name }}"
                value="0"
                aria-label="clear"
                @class(['rating-hidden' => ! $unstyled])
                @checked((float) $value === 0.0)
                {{ $inputAttributes }}
            />
        @endif

        @for ($index = 1; $index <= $itemCount; $index++)
            <input
                type="radio"
                name="{{ $name }}"
                value="{{ $index }}"
                aria-label="{{ $index }} {{ $index === 1 ? 'star' : 'stars' }}"
                @checked((float) $value === (float) $index)
                @class([
                    'mask' => ! $unstyled,
                    $maskClass => ! $unstyled,
                    $colorClass => ! $unstyled && $colorClass,
                ])
                {{ $inputAttributes }}
            />
        @endfor
    @endif
</div>
