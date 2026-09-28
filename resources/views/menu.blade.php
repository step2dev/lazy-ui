@if ($title)
    <li class="menu-title"><span>{{ $title }}</span></li>
@endif

<li @if ($toggle) x-data="{ open: false }" @endif>
    <a
        @if (! $toggle && ! $disabled) href="{{ $resolvedHref }}"
        @elseif ($disabled) role="link" aria-disabled="true"
        @endif
        {{ $attributes }}
        @if ($toggle) @click="open = ! open" :aria-expanded="open" @endif
    >
        @if ($inlineIcon || $icon)
            <div>
                @if ($inlineIcon)
                    <i class="{{ $inlineIcon }}"></i>
                @else
                    <div class="nav-icon h-5 w-5">{!! $icon !!}</div>
                @endif
            </div>
        @endif

        <div>{{ $label }}</div>

        @if ($indicator){{ $indicator }}@endif

        @if ($countLabel)
            <span class="indicator-item badge badge-primary transition-all transform">{{ $countLabel }}</span>
        @endif

        @if ($toggle)
            <svg class="transform transition" :class="{ 'rotate-180': open }" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M18 15L12 9L6 15" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
            </svg>
        @endif
    </a>

    @if ($slot->isNotEmpty())
        <ul class="menu-dropdown flex flex-col" @if ($toggle) x-show="open" :class="{ 'menu-dropdown-show': open }" x-transition style="display: none" @endif>
            {{ $slot }}
        </ul>
    @endif
</li>
