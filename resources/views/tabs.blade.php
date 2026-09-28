<div {{ $attributes }}>
    @foreach ($items as $item)
        @if ($item['href'])
            <a role="tab" href="{{ $item['href'] }}" @class(['tab' => ! $unstyled, 'tab-active' => ! $unstyled && $item['active'], 'tab-disabled' => ! $unstyled && $item['disabled']]) @if ($item['disabled']) aria-disabled="true" tabindex="-1" @endif>{{ $item['label'] }}</a>
        @else
            <button type="button" role="tab" @class(['tab' => ! $unstyled, 'tab-active' => ! $unstyled && $item['active'], 'tab-disabled' => ! $unstyled && $item['disabled']]) @disabled($item['disabled'])>{{ $item['label'] }}</button>
        @endif
        @if ($item['content'] !== null)<div @class(['tab-content' => ! $unstyled])>{{ $item['content'] }}</div>@endif
    @endforeach
    {{ $slot }}
</div>
