@props([
    'placeholder' => '',
    'hasError' => false,
    'hint' => '',
    'unstyled' => false,
])

@aware([
    'join' => false,
])

<select {{ $attributes->class([
    'join-item' => ! $unstyled && $join,
])->merge([
    'class' => $unstyled ? '' : 'w-full'.($hasError ? ' text-error select-error' : ''),
]) }}>
    @if ($placeholder)
        <option value="">{{ $placeholder }}</option>
    @endif
    {{ $slot }}
</select>

@if ($hint)
    <p @class(['validator-hint' => ! $unstyled])>{{ $hint }}</p>
@endif
