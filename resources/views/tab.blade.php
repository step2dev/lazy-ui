@props([
    'label' => ''
])

@aware([
    'type' => ''
    'size' => ''
])

<a {{ $attributes->class([
    'tab-bordered' => $type === 'bordered',
    'tab-lifted' => $type === 'lifted',
    'tab-xs' => $size === 'xs',
    'tab-sm' => $size === 'sm',
    'tab-md' => $size === 'md',
    'tab-lg' => $size === 'lg',

]) }}>{{ $label ?: $slot }}</a>
