@props([
    'steps' => null,
])

@if ($steps)
    <input type="range" {{ $attributes->merge(['class' => 'range']) }} />
    <div class="w-full flex justify-between text-xs px-2">
        @foreach(range(0, $steps-1) as $stepValue)
            <span>|</span>
        @endforeach
    </div>
@else
    <input type="range" {{ $attributes->merge(['class' => 'range']) }}/>
@endif
