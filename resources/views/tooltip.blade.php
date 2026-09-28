<div {{ $attributes }} @if ($tip) data-tip="{{ $tip }}" @endif>
    @isset($content)<div @class(['tooltip-content' => ! $unstyled])>{{ $content }}</div>@endisset
    {{ $slot }}
</div>
