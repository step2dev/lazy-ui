<figure {{ $attributes }}>
    <div @class(['diff-item-1' => ! $unstyled])>{{ $before ?? '' }}</div>
    <div @class(['diff-item-2' => ! $unstyled])>{{ $after ?? $slot }}</div>
    <div @class(['diff-resizer' => ! $unstyled])></div>
</figure>
