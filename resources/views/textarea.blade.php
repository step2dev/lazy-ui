@props([
    'hasError' => false,
    'value' => ''
])
<textarea {{ $attributes->merge(['class' => 'w-full'.($hasError ? ' textarea-error' : '')]) }}>{{ $value ?: $slot }}</textarea>
