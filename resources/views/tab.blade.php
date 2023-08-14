@props([
    'label' => ''
])

@aware([
    'tabsEnable' => false
])

<a {{ $attributes }}>{{ $label ?: $slot }}</a>
