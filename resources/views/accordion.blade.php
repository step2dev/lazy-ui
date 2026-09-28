@if ($collectionMode)
    <div {{ $attributes }}>
        @foreach ($items as $item)
            <div class="{{ $item['classes'] }}">
                <input type="{{ $item['inputType'] }}" name="{{ $item['name'] }}" @checked($item['active']) @disabled($item['disabled']) />
                <div class="{{ $viewClasses['title'] }}">{{ $item['title'] }}</div>
                <div class="{{ $viewClasses['content'] }}">{{ $item['content'] }}</div>
            </div>
        @endforeach
        {{ $slot }}
    </div>
@else
    <div {{ $attributes }}>
        <input type="{{ $inputType }}" name="{{ $name }}" @checked($active) />
        <div class="{{ $viewClasses['title'] }}">{{ $resolvedTitle }}</div>
        <div class="{{ $viewClasses['content'] }}">{{ $slot }}</div>
    </div>
@endif
