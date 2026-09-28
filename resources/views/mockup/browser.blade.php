<div {{ $attributes }}>
    @if ($url)
        <div class="{{ $viewClasses['toolbar'] }}">
            <div class="{{ $viewClasses['url'] }}">{{ $url }}</div>
        </div>
    @endif
    <div class="{{ $viewClasses['content'] }}">{{ $slot }}</div>
</div>
