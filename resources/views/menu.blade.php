@props([
    'route' => '',
    'href' => '#',
    'icon' => '',
    'label' => '',
    'title' => '',
    'show' => true,
    'count' => 0,
    'inlineIcon' => '',
    'indicator' => '',
    'toggle' => false,
    'active' => false,
    'disabled' => false,
    'focus' => false,
])

@php
    if (! $show) {
        return;
    }

    $routePath = $route ? route($route, [], false) : $href;
    $path = trim($routePath !== '/admin' ? $routePath.'*' : $routePath, '/');
    $count = (int) $count > 99 ? '99+' : $count;
    $isActive = $active || request()->is($path);
@endphp

@if ($title)
    <li class="menu-title">
        <span>{{ $title }}</span>
    </li>
@endif

<li @if ($toggle) x-data="{ open: false }" @endif>
    <a
        @if (! $toggle && ! $disabled)
            href="{{ $route ? route($route) : $href }}"
        @elseif ($disabled)
            role="link"
            aria-disabled="true"
        @endif
        {{ $attributes->class([
            'menu-active' => $isActive,
            'menu-disabled' => $disabled,
            'menu-focus' => $focus,
            'menu-dropdown-toggle' => $toggle,
        ]) }}
        @if ($toggle)
            @click="open = ! open"
            :aria-expanded="open"
        @endif
    >
        @if ($inlineIcon || $icon)
            <div>
                @if ($inlineIcon)
                    <i class="{{ $inlineIcon }}"></i>
                @else
                    <div class="nav-icon h-5 w-5">
                        {!! $icon !!}
                    </div>
                @endif
            </div>
        @endif

        <div>{{ $label }}</div>

        @if ($indicator)
            {{ $indicator }}
        @endif

        @if ($count)
            <span class="indicator-item badge badge-primary transition-all transform">{{ $count }}</span>
        @endif

        @if ($toggle)
            <svg class="transform transition" :class="{ 'rotate-180': open }" width="24" height="24"
                 viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M18 15L12 9L6 15" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                      stroke-linejoin="round"></path>
            </svg>
        @endif
    </a>

    @if ($slot->isNotEmpty())
        <ul
            class="menu-dropdown flex flex-col"
            @if ($toggle)
                x-show="open"
                :class="{ 'menu-dropdown-show': open }"
                x-transition
                style="display: none"
            @endif
        >
            {{ $slot }}
        </ul>
    @endif
</li>
