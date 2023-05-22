@props([
    'hasError' => false,
    'value' => ''
])
<textarea {{ $attributes->merge(['class' => 'textarea'.($hasError ? ' textarea-error' : '')]) }}>{{ $value ?: $slot }}</textarea>
