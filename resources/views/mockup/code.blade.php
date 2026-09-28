<div {{ $attributes }}>
    @if ($lines)
        @foreach ($lines as $line)
            <pre data-prefix="{{ $line['prefix'] }}" @if ($line['classes']) class="{{ $line['classes'] }}" @endif><code>{{ $line['code'] }}</code></pre>
        @endforeach
    @else
        <pre data-prefix="{{ $prefix }}"><code>{{ $slot }}</code></pre>
    @endif
</div>
