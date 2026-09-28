<label {{ $attributes }}>
    @foreach ($cells as $cell)<span></span>@endforeach
    <input
        type="text"
        name="{{ $name }}"
        value="{{ $value }}"
        autocomplete="one-time-code"
        inputmode="{{ $inputMode }}"
        maxlength="{{ $length }}"
        @if ($pattern) pattern="{{ $pattern }}" @endif
        @readonly($readonly)
        {{ $inputAttributes }}
    />
</label>
