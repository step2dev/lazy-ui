<fieldset {{ $attributes }}>
    @if ($legend)<legend class="{{ $viewClasses['legend'] }}">{{ $legend }}</legend>@endif
    @if ($label)<label class="{{ $viewClasses['label'] }}">{{ $label }}</label>@endif
    {{ $slot }}
    @if ($hint)<p class="{{ $viewClasses['hint'] }}">{{ $hint }}</p>@endif
</fieldset>
