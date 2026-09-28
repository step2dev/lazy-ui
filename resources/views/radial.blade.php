@props([
    'value' => 0,
    'unstyled' => false,
])

<div {{ $attributes->merge([
    'class' => $unstyled ? '' : 'radial-progress',
]) }} style="--value:{{ $value }};">{{ $value }}%</div>
