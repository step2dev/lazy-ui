<div {{ $attributes }} @if ($tip) data-tip="{{ $tip }}" @endif>
    @isset($content)<div class="{{ $viewClasses['content'] }}">{{ $content }}</div>@endisset
    {{ $slot }}
</div>
