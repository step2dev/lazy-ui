<div {{ $attributes->merge(['class' => 'drawer']) }}>
    <input id="drawer-toggle" type="checkbox" class="drawer-toggle" />
    <div class="drawer-content">
        {{ $slot }}
    </div>
    <div class="drawer-side">
        <label for="drawer-toggle" class="drawer-overlay"></label>
        <ul class="menu p-4 w-80 bg-base-100">
            {{ $drawerContent }}
        </ul>
    </div>
</div>