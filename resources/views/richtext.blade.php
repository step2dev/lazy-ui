@props([
    'hasError' => false,
    'value' => '',
    'options' => [],
])
<textarea {{ $attributes->merge(['class' => 'textarea'.($hasError ? ' textarea-error' : '')]) }}>{{ $value ?: $slot }}</textarea>
