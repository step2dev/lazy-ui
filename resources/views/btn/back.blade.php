@props([
    'group' => false,
])

@props([
    'join' => true,
])

<x-lazy-btn outline ghost sm href="javascript:history.back()" style="display: flex;align-items: center;" {{ $attributes->class([
    'join-item' => $join,
]) }}>
    <svg viewBox="0 0 24 24" style="width: 16px;height: 16px;">
        <path fill="none" stroke="currentColor" stroke-width="2" d="M15 6l-6 6l6 6"></path>
    </svg>
    @if($slot->isNotEmpty())
        {{ $slot }}
    @else
        {{ __('lazy-ui::buttons.back') }}
    @endif
</x-lazy-btn>
