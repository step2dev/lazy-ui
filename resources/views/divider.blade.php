@props([
    'text' => '',
    'hr' => false
])
<div {{ $attributes->merge(['class' => 'divider'. ($hr ? ' divider-horizontal' : '')]) }}>{{ $text ?: $slot }}</div>
