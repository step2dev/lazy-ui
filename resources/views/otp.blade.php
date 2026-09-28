<label {{ $attributes }}>
    @for ($index = 0; $index < $cellCount; $index++)<span></span>@endfor
    <input type="text" name="{{ $name }}" value="{{ $value }}" autocomplete="one-time-code" inputmode="numeric" maxlength="{{ $cellCount }}" pattern="[0-9]*" />
</label>
