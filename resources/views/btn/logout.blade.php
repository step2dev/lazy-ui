@props([
    'icon' => ''
])
<div>
    <a href="#" onclick="javascript:" {{ $attributes->merge(['class'=>"logout"]) }}>
        {!! $icon !!}
        <span>{{ __('Logout') }}</span>
    </a>
    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
        @csrf
    </form>
</div>
