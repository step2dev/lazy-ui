@props([
    'flower' => false,
    'label' => 'Menu',
    'unstyled' => false,
])

<div {{ $attributes->class([
    'fab' => ! $unstyled,
    'fab-flower' => ! $unstyled && $flower,
]) }}>
    @isset($trigger)
        {{ $trigger }}
    @else
        <div tabindex="0" role="button" @class(['btn btn-circle' => ! $unstyled])>{{ $label }}</div>
    @endisset

    {{ $slot }}

    @isset($close)
        <div @class(['fab-close' => ! $unstyled])>{{ $close }}</div>
    @endisset

    @isset($main)
        <div @class(['fab-main-action' => ! $unstyled])>{{ $main }}</div>
    @endisset
</div>
