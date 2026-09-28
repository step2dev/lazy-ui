<fieldset {{ $attributes }}>
    @if ($legend)<legend @class(['fieldset-legend' => ! $unstyled])>{{ $legend }}</legend>@endif
    @if ($label)<label @class(['label' => ! $unstyled])>{{ $label }}</label>@endif
    {{ $slot }}
    @if ($hint)<p @class(['label' => ! $unstyled])>{{ $hint }}</p>@endif
</fieldset>
