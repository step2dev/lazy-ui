@props([
    'href' => null,
    'active' => false,
    'disabled' => false,
    'unstyled' => false,
])

@if ($href && ! $disabled)
    <a href="{{ $href }}" {{ $attributes->class([
        'join-item btn' => ! $unstyled,
        'btn-active' => ! $unstyled && $active,
    ]) }}>{{ $slot }}</a>
@else
    <button type="button" @disabled($disabled) {{ $attributes->class([
        'join-item btn' => ! $unstyled,
        'btn-active' => ! $unstyled && $active,
    ]) }}>{{ $slot }}</button>
@endif
