<details {{ $attributes }} @if ($open) open @endif>
    <summary class="{{ $viewClasses['title'] }}">{{ $title }}</summary>
    <div class="{{ $viewClasses['content'] }}">{{ $slot }}</div>
</details>
