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
])

@php
    if (! $show) {
        return ;
    }

    $routePath = $route ? route($route, [], false) : $href;

    $path = trim($routePath !== '/admin' ? $routePath.'*' : $routePath, '/');

    $count = (int) $count > 99 ? '99+' : $count
@endphp
@if ($title)
    <li class="menu-title">
        <span>{{ $title }}</span>
    </li>
@endif

<li @if ($toggle)x-data="{open: !1}" @endif>
    <a @if (! $toggle)
           href="{{ $route ? route($route) : $href }}"
       @endif
       {{ $attributes->class([
            'active' => request()->is($path),
        ]) }}
       @if ($toggle)
           @click="open = ! open"
        @endif
    >
        <div>
            @if ($inlineIcon || $icon)
                @if ($inlineIcon)
                    <i class="{{ $inlineIcon }}"></i>
                @else
                    <div class="nav-icon h-5 w-5">
                        {!! $icon !!}
                    </div>
                @endif
            @endif
        </div>
        <div>{{ $label }}</div>
        @if ($indicator)
            {{ $indicator }}
        @endif
        @if ($count)
            <span class="indicator-item badge badge-primary transition-all transform">{{ $count }}</span>
        @endif
        @if ($toggle)
            <svg id="icon1" class="transform transition" :class="{ 'rotate-180': !open }" width="24" height="24"
                 viewBox="0 0 24 24"
                 fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M18 15L12 9L6 15" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                      stroke-linejoin="round"></path>
            </svg>
        @endif
    </a>
    @if ($slot->isNotEmpty())
        <ul class="flex flex-col" x-show="open"
            x-transition:enter="transition ease-out duration-200"
            x-transition:enter-start="opacity-0 transform scale-90"
            x-transition:enter-end="opacity-100 transform scale-100"
            x-transition:leave="transition ease-in duration-200"
            x-transition:leave-start="opacity-100 transform scale-100"
            x-transition:leave-end="opacity-0 transform scale-90"
            style="display: none"
        >
            {{ $slot }}
        </ul>
    @endif
</li>
