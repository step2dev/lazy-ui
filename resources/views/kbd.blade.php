@props([
    'value' => '',
])
<kbd {{ $attributes }}>{{ $value ?: $slot }}</kbd>
