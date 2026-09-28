<input type="range" {{ $attributes }} />
@if ($marks && ! $unstyled)
    <div class="w-full flex justify-between text-xs px-2">
        @foreach ($marks as $mark)<span>|</span>@endforeach
    </div>
@endif
