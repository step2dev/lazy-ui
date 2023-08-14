@props([
    'type' => '',
    'size' => ''
])

<div {{ $attributes->class([
    'tabs-boxed' => $type === 'boxed',
]) }}>
    {{ $slot }}
</div>
