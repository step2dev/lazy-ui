@props([
    'src' => 'https://picsum.photos/200/200?random=1',
    'alt' => 'Avatar',
    'onlineEnabled' => false,
    'offlineEnabled' => false,
    'placeholderEnabled' => false,
])

<div @class([
    'avatar',
    'avatar-online' => $onlineEnabled,
    'avatar-offline' => $offlineEnabled,
    'avatar-placeholder' => $placeholderEnabled,
])>
    <div {{ $attributes }}>
        @if ($placeholderEnabled && ! $src)
            {{ $slot }}
        @else
            <img src="{{ $src }}" alt="{{ $alt }}" />
        @endif
    </div>
</div>
