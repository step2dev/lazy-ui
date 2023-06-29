@props([
    'title' => '',
    'active' => false,
    'name' => ''
])

<div {{ $attributes->merge(['class' => "collapse bg-base-200 mb-2"]) }}>
    <input type="radio" name="{{ $name }}" {{ $active ? 'checked=checked' : '' }} />
    <div class="collapse-title text-xl font-medium">
        {{ $title }}
    </div>
    <div class="collapse-content">
        {{ $slot }}
    </div>
</div>
