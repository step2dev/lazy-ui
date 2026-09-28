<div {{ $attributes }}>
    @foreach ($items as $item)
        @if ($item['href'] && ! $item['disabled'])
            <a href="{{ $item['href'] }}" class="{{ $unstyled ? '' : $item['classes'] }}">
                @if ($item['content'] !== null){{ $item['content'] }}@endif
                @if ($item['label'])<span @class(['dock-label' => ! $unstyled])>{{ $item['label'] }}</span>@endif
            </a>
        @else
            <button type="button" class="{{ $unstyled ? '' : $item['classes'] }}" @disabled($item['disabled'])>
                @if ($item['content'] !== null){{ $item['content'] }}@endif
                @if ($item['label'])<span @class(['dock-label' => ! $unstyled])>{{ $item['label'] }}</span>@endif
            </button>
        @endif
    @endforeach
    {{ $slot }}
</div>
