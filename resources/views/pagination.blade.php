@props(['unstyled' => false])

<nav {{ $attributes->class(['join' => ! $unstyled]) }} aria-label="Pagination">
    {{ $slot }}
</nav>
