@props([
    'title' => '',
    'active' => false,
    'name' => '',
    'toggle' => false,
])

<div {{ $attributes }}>
    <input type="{{ $toggle ? 'checkbox' : 'radio' }}" name="{{ $name }}" {{ $active ? 'checked=checked' : '' }} />
    <div class="collapse-title text-xl font-medium">
        {{ $title }}
    </div>
    <div class="collapse-content">
        {{ $slot }}
    </div>
</div>
