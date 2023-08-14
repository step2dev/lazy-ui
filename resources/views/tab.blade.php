@props([
    'label' => ''
])

@aware([
    'tabsType' => ''
])

<a {{ $attributes }}>{{ $label ?: $slot }}</a>
