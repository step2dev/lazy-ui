@aware(['join' => false])

<textarea {{ $attributes->class([
    'join-item' => $join,
])->merge([
    'class' => $controlClass,
]) }}>{{ $value ?: $slot }}</textarea>

@if ($hint)
    <p class="{{ $hintClass }}">{{ $hint }}</p>
@endif
