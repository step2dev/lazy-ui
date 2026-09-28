@aware(['join' => false])

<select {{ $attributes->class([
    'join-item' => $join,
])->merge([
    'class' => $controlClass,
]) }}>
    @if ($placeholder)<option value="">{{ $placeholder }}</option>@endif
    @foreach ($options as $option)
        <option value="{{ $option['value'] }}" @selected($option['selected']) @disabled($option['disabled'])>{{ $option['label'] }}</option>
    @endforeach
    {{ $slot }}
</select>

@if ($hint)<p class="{{ $hintClass }}">{{ $hint }}</p>@endif
