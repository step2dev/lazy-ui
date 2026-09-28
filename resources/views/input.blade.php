@props([
    'placeholder' => '',
    'hasError' => false,
    'hint' => '',
    'unstyled' => false,
])

@aware([
    'join' => false,
])

<input {{ $attributes->class([
    'join-item' => ! $unstyled && $join,
])->merge([
    'class' => $unstyled ? '' : 'w-full'.($hasError ? ' text-error input-error' : ''),
    'type' => 'text',
    'placeholder' => $placeholder,
]) }} />

@if ($hint)
    <p @class(['validator-hint' => ! $unstyled])>{{ $hint }}</p>
@endif
