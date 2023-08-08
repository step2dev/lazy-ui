@props([
    'text' => '',
])
<div {{ $attributes }}>{{ $text ?: $slot }}</div>
