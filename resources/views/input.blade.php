@aware(['join' => false])

<input {{ $attributes->class([
    'join-item' => $join,
])->merge([
    'class' => $controlClass,
    'type' => 'text',
    'placeholder' => $placeholder,
]) }} />

@if ($hint)
    <p class="{{ $hintClass }}">{{ $hint }}</p>
@endif
