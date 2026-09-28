@props([
    'steps' => null,
    'unstyled' => false,
])

@if ($steps)
    <input type="range" {{ $attributes }} />
    @unless ($unstyled)
        <div class="w-full flex justify-between text-xs px-2">
            @foreach(range(0, $steps - 1) as $stepValue)
                <span>|</span>
            @endforeach
        </div>
    @endunless
@else
    <input type="range" {{ $attributes }}/>
@endif
