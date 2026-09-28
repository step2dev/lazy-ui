@props([
    'title' => '',
    'open' => false,
    'arrow' => true,
    'plus' => false,
    'unstyled' => false,
])

<details
    {{ $attributes->class([
        'collapse' => ! $unstyled,
        'collapse-arrow' => ! $unstyled && $arrow && ! $plus,
        'collapse-plus' => ! $unstyled && $plus,
    ]) }}
    @if ($open) open @endif
>
    <summary @class(['collapse-title' => ! $unstyled])>{{ $title }}</summary>
    <div @class(['collapse-content' => ! $unstyled])>{{ $slot }}</div>
</details>
