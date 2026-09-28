<details {{ $attributes }} @if ($open) open @endif>
    <summary @class(['collapse-title' => ! $unstyled])>{{ $title }}</summary>
    <div @class(['collapse-content' => ! $unstyled])>{{ $slot }}</div>
</details>
