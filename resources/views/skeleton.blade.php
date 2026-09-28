@props(['unstyled' => false])

<div {{ $attributes->class(['skeleton' => ! $unstyled]) }}>{{ $slot }}</div>
