@props(['value' => 0])
<div {{ $attributes->merge(['class' => 'radial-progress']) }}class="" style="--value:{{ $value }};">{{ $value }}%</div>
