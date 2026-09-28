<div {{ $attributes }}>
    @foreach ($items as $item)
        @if ($item['href'])
            <a role="tab" href="{{ $item['href'] }}" class="{{ $item['classes'] }}" @if ($item['disabled']) aria-disabled="true" tabindex="-1" @endif>{{ $item['label'] }}</a>
        @else
            <button type="button" role="tab" class="{{ $item['classes'] }}" @disabled($item['disabled'])>{{ $item['label'] }}</button>
        @endif
        @if ($item['content'] !== null)<div class="{{ $viewClasses['content'] }}">{{ $item['content'] }}</div>@endif
    @endforeach
    {{ $slot }}
</div>
