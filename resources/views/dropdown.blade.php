@props([
    'label' => 'Menu',
    'hover' => false,
    'open' => false,
    'close' => false,
    'start' => false,
    'center' => false,
    'end' => false,
    'top' => false,
    'bottom' => false,
    'left' => false,
    'right' => false,
    'unstyled' => false,
])

<div {{ $attributes->class([
    'dropdown' => ! $unstyled,
    'dropdown-hover' => ! $unstyled && $hover,
    'dropdown-open' => ! $unstyled && $open,
    'dropdown-close' => ! $unstyled && $close,
    'dropdown-start' => ! $unstyled && $start,
    'dropdown-center' => ! $unstyled && $center,
    'dropdown-end' => ! $unstyled && $end,
    'dropdown-top' => ! $unstyled && $top,
    'dropdown-bottom' => ! $unstyled && $bottom,
    'dropdown-left' => ! $unstyled && $left,
    'dropdown-right' => ! $unstyled && $right,
]) }}>
    @isset($trigger)
        {{ $trigger }}
    @else
        <button type="button" tabindex="0" @class(['btn' => ! $unstyled])>{{ $label }}</button>
    @endisset

    <div tabindex="0" @class([
        'dropdown-content menu bg-base-100 rounded-box z-10 mt-2 w-52 p-2 shadow-sm' => ! $unstyled,
    ])>
        {{ $slot }}
    </div>
</div>
