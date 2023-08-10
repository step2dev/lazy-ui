@props([
    'group' => false,
])

<x-lazy-btn :group="$group" outline ghost sm href="javascript:history.back()" style="display: flex;align-items: center;" {{ $attributes }}>
    <svg viewBox="0 0 24 24" style="width: 16px;height: 16px;">
        <path fill="none" stroke="currentColor" stroke-width="2" d="M15 6l-6 6l6 6"></path>
    </svg>
    @if($slot->isNotEmpty())
        {{ $slot }}
    @else
        {{ __('lazy::buttons.back') }}
    @endif
</x-lazy-btn>
