@props([
    'src'         => '',
    'alt'         => 'Avatar',
    'placeholder' => '',
    'onlineEnabled' => false,
    'online' => false,

])

<div class="avatar">
    <div {{ $attributes->merge(['class' => '']) }}>
        <img src="{{ $src }}" alt="{{ $alt }}" />
    </div>
</div>
