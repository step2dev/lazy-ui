@if ($collectionMode)
    <div {{ $attributes }}>
        @foreach ($items as $item)
            <div class="{{ $unstyled ? '' : $item['classes'] }}">
                <input type="{{ $item['inputType'] }}" name="{{ $item['name'] }}" @checked($item['active']) @disabled($item['disabled']) />
                <div @class(['collapse-title text-xl font-medium' => ! $unstyled])>{{ $item['title'] }}</div>
                <div @class(['collapse-content' => ! $unstyled])>{{ $item['content'] }}</div>
            </div>
        @endforeach
        {{ $slot }}
    </div>
@else
    <div {{ $attributes }}>
        <input type="{{ $inputType }}" name="{{ $name }}" @checked($active) />
        <div @class(['collapse-title text-xl font-medium' => ! $unstyled])>{{ $resolvedTitle }}</div>
        <div @class(['collapse-content' => ! $unstyled])>{{ $slot }}</div>
    </div>
@endif
