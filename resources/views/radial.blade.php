<div {{ $attributes }} role="progressbar" aria-valuenow="{{ $value }}" aria-valuemin="0" aria-valuemax="100">
    {{ $label !== '' ? $label : $value.'%' }}
</div>
