@props([
    'min' => 0,
    'max' => 100,
    'steps' => null,
    'value' => 0,
])

@php
    $step = 1;
    if ($steps) {
        $step = ($max - $min) / ($steps - 1);
    }
@endphp

@if ($steps)
    <input type="range" {{ $attributes->merge(['class' => 'range']) }} min="{{ $min }}" max="{{ $max }}"
           step="{{ $step }}"/>
    <div class="w-full flex justify-between text-xs px-2">
        @foreach(range(0, $steps) as $stepValue)
            <span>|</span>
        @endforeach
    </div>
@else
    <input type="range" {{ $attributes->merge(['class' => 'range']) }} min="{{ $min }}" max="{{ $max }}" value="0"/>
@endif
