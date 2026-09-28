@props([
    'active' => false,
    'rotate' => false,
    'flip' => false,
    'unstyled' => false,
])

<label {{ $attributes->class([
    'swap' => ! $unstyled,
    'swap-active' => ! $unstyled && $active,
    'swap-rotate' => ! $unstyled && $rotate,
    'swap-flip' => ! $unstyled && $flip,
]) }}>
    {{ $slot }}

    @isset($on)
        <span @class(['swap-on' => ! $unstyled])>{{ $on }}</span>
    @endisset

    @isset($off)
        <span @class(['swap-off' => ! $unstyled])>{{ $off }}</span>
    @endisset

    @isset($indeterminate)
        <span @class(['swap-indeterminate' => ! $unstyled])>{{ $indeterminate }}</span>
    @endisset
</label>
