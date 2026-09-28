@aware(['join' => false])

<select {{ $attributes->class([
    'join-item' => ! $unstyled && $join,
])->merge([
    'class' => $unstyled ? '' : 'w-full'.($hasError ? ' text-error select-error' : ''),
]) }}>
    @if ($placeholder)<option value="">{{ $placeholder }}</option>@endif
    @foreach ($options as $option)
        <option value="{{ $option['value'] }}" @selected($option['selected']) @disabled($option['disabled'])>{{ $option['label'] }}</option>
    @endforeach
    {{ $slot }}
</select>

@if ($hint)<p @class(['validator-hint' => ! $unstyled])>{{ $hint }}</p>@endif
