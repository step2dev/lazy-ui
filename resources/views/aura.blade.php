@props([
    'type' => '',
    'size' => '',
    'glow' => false,
    'unstyled' => false,
])

<div {{ $attributes->class([
    'aura' => ! $unstyled,
    'aura-dual' => ! $unstyled && $type === 'dual',
    'aura-rainbow' => ! $unstyled && $type === 'rainbow',
    'aura-holo' => ! $unstyled && $type === 'holo',
    'aura-gold' => ! $unstyled && $type === 'gold',
    'aura-silver' => ! $unstyled && $type === 'silver',
    'aura-glow' => ! $unstyled && $glow,
    'aura-xs' => ! $unstyled && $size === 'xs',
    'aura-sm' => ! $unstyled && $size === 'sm',
    'aura-md' => ! $unstyled && $size === 'md',
    'aura-lg' => ! $unstyled && $size === 'lg',
    'aura-xl' => ! $unstyled && $size === 'xl',
]) }}>
    {{ $slot }}
</div>
