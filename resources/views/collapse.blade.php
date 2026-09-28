<details {{ $attributes }} @if ($open) open @endif>
    <summary class="{{ $viewClasses['title'] }}">
        @isset($summary)
            {{ $summary }}
        @else
            {{ $title }}
        @endisset
    </summary>
    <div class="{{ $viewClasses['content'] }}">{{ $slot }}</div>
</details>
