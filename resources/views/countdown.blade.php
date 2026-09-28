@props([
    'value' => 0,
    'label' => '',
    'unstyled' => false,
])

<span {{ $attributes->class(['countdown' => ! $unstyled]) }}>
    <span style="--value:{{ max(0, min(999, (int) $value)) }};"></span>
</span>@if($label)<span>{{ $label }}</span>@endif
