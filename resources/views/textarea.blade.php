@props([
    'hasError' => false,
    'value' => '',
    'hint' => '',
    'unstyled' => false,
])

@aware([
    'join' => false,
])

<textarea {{ $attributes->class([
    'join-item' => ! $unstyled && $join,
])->merge([
    'class' => $unstyled ? '' : 'w-full'.($hasError ? ' textarea-error' : ''),
]) }}>{{ $value ?: $slot }}</textarea>

@if ($hint)
    <p @class(['validator-hint' => ! $unstyled])>{{ $hint }}</p>
@endif
