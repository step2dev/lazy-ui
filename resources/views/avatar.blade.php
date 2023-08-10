@props([
    'src'         => 'https://picsum.photos/200/200?random=1',
    'alt'         => 'Avatar',
    'placeholder' => '',
    'onlineEnabled' => false,
    'online' => false,

])

<div class="avatar">
    <div {{ $attributes }}>
        <img src="{{ $src }}" alt="{{ $alt }}" />
    </div>
</div>
