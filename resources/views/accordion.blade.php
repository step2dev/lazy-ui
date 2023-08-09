@props([
    'title' => '',
    'active' => false,
    'name' => ''
])

<div {{ $attributes }}>
    <input type="radio" name="{{ $name }}" {{ $active ? 'checked=checked' : '' }} />
    <div class="collapse-title text-xl font-medium">
        {{ $title }}
    </div>
    <div class="collapse-content">
        {{ $slot }}
    </div>
</div>
