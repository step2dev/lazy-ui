@props([
    'tip' => '',
    'open' => false
])

<div {{ $attributes->merge(['class'=>"tooltip"]) }} data-tip="{{ $tip }}">
    {{ $slot }}
</div>
