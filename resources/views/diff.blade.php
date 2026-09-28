<figure {{ $attributes }}>
    <div class="{{ $viewClasses['first'] }}">{{ $before ?? '' }}</div>
    <div class="{{ $viewClasses['second'] }}">{{ $after ?? $slot }}</div>
    <div class="{{ $viewClasses['resizer'] }}"></div>
</figure>
