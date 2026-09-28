<?php

namespace Step2dev\LazyUI\Tests\Components;

it('keeps Tailwind 4 aware of package PHP, Blade and JavaScript sources', function () {
    $css = file_get_contents(dirname(__DIR__, 2).'/stubs/css/lazy.css');

    expect($css)
        ->toContain('@source "../../vendor/step2dev/lazy-ui/src/**/*.php"')
        ->toContain('@source "../../vendor/step2dev/lazy-ui/resources/views/**/*.blade.php"')
        ->toContain('@source "../../vendor/step2dev/lazy-ui/resources/js/**/*.js"');
});

it('renders universal daisyUI wrappers with their default component classes', function (string $component, string $class) {
    $this
        ->blade("<x-lazy-{$component} />")
        ->assertSee($class);
})->with([
    ['aura', 'aura'],
    ['calendar', 'input'],
    ['card', 'card'],
    ['carousel', 'carousel'],
    ['collapse', 'collapse'],
    ['diff', 'diff'],
    ['dock', 'dock'],
    ['dropdown', 'dropdown'],
    ['fab', 'fab'],
    ['fieldset', 'fieldset'],
    ['file-input', 'file-input'],
    ['filter', 'filter'],
    ['footer', 'footer'],
    ['hover-gallery', 'hover-gallery'],
    ['hover-3d', 'hover-3d'],
    ['list', 'list'],
    ['mask', 'mask'],
    ['megamenu', 'megamenu'],
    ['modal', 'modal'],
    ['navbar', 'navbar'],
    ['otp', 'otp'],
    ['pagination', 'join'],
    ['progress', 'progress'],
    ['skeleton', 'skeleton'],
    ['stats', 'stats'],
    ['status', 'status'],
    ['steps', 'steps'],
    ['swap', 'swap'],
    ['table', 'table'],
    ['text-rotate', 'text-rotate'],
    ['theme-controller', 'theme-controller'],
    ['timeline', 'timeline'],
]);

it('registers and renders legacy components that existed but were not wired into Lazy UI', function (string $component, string $class) {
    $this
        ->blade("<x-lazy-{$component} />")
        ->assertSee($class);
})->with([
    ['drawer', 'drawer'],
    ['hero', 'hero'],
    ['indicator', 'indicator'],
]);

it('keeps legacy component aliases mapped to daisyUI 5 classes', function () {
    $this
        ->blade('<x-lazy-btn-group><x-lazy-btn>One</x-lazy-btn><x-lazy-btn>Two</x-lazy-btn></x-lazy-btn-group>')
        ->assertSee('join')
        ->assertSee('join-item');

    $this
        ->blade('<x-lazy-input-group><x-lazy-input /><x-lazy-btn>Go</x-lazy-btn></x-lazy-input-group>')
        ->assertSee('join')
        ->assertSee('join-item');

    $this
        ->blade('<x-lazy-card bordered compact>Content</x-lazy-card>')
        ->assertSee('card-border')
        ->assertSee('card-sm');

    $this
        ->blade('<x-lazy-tabs boxed />')
        ->assertSee('tabs-box');

    $this
        ->blade('<x-lazy-btn danger>Delete</x-lazy-btn>')
        ->assertSee('btn-error')
        ->assertDontSee('btn-danger');

    $this
        ->blade('<x-lazy-badge danger>Danger</x-lazy-badge>')
        ->assertSee('badge-error')
        ->assertDontSee('badge-danger');

    $this
        ->blade('<x-lazy-alert danger>Danger</x-lazy-alert>')
        ->assertSee('alert-error')
        ->assertDontSee('alert-danger');
});

it('supports daisyUI 5 colors sizes and styles without manual class names', function () {
    $this
        ->blade('<x-lazy-btn neutral xl soft>Save</x-lazy-btn>')
        ->assertSee('btn-neutral')
        ->assertSee('btn-xl')
        ->assertSee('btn-soft');

    $this
        ->blade('<x-lazy-badge primary xl dash>Badge</x-lazy-badge>')
        ->assertSee('badge-primary')
        ->assertSee('badge-xl')
        ->assertSee('badge-dash');

    $this
        ->blade('<x-lazy-checkbox neutral xl />')
        ->assertSee('checkbox-neutral')
        ->assertSee('checkbox-xl');

    $this
        ->blade('<x-lazy-radio neutral xl />')
        ->assertSee('radio-neutral')
        ->assertSee('radio-xl');

    $this
        ->blade('<x-lazy-range neutral xl vertical />')
        ->assertSee('range-neutral')
        ->assertSee('range-xl')
        ->assertSee('range-vertical');

    $this
        ->blade('<x-lazy-loading xl />')
        ->assertSee('loading-xl');

    $this
        ->blade('<x-lazy-kbd xl>K</x-lazy-kbd>')
        ->assertSee('kbd-xl');
});

it('integrates daisyUI validator into form inputs', function () {
    $this
        ->blade('<x-lazy-input validator hint="Invalid value" required />')
        ->assertSee('validator')
        ->assertSee('validator-hint')
        ->assertSee('Invalid value');

    $this
        ->blade('<x-lazy-select validator hint="Choose a value"><option>One</option></x-lazy-select>')
        ->assertSee('validator')
        ->assertSee('validator-hint');

    $this
        ->blade('<x-lazy-textarea validator hint="Required" />')
        ->assertSee('validator')
        ->assertSee('validator-hint');
});

it('renders old demo-only components as reusable components', function () {
    $this
        ->blade('<x-lazy-countdown :value="42" />')
        ->assertSee('--value:42', false)
        ->assertDontSee('Large text');

    $this
        ->blade('<x-lazy-rating name="score" :items="5" :value="3" />')
        ->assertSee('name="score"', false)
        ->assertDontSee('rating-10');

    $this
        ->blade('<x-lazy-mockup-browser url="https://example.com">Browser content</x-lazy-mockup-browser>')
        ->assertSee('https://example.com')
        ->assertSee('Browser content')
        ->assertDontSee('Hello!');

    $this
        ->blade('<x-lazy-mockup-code>npm test</x-lazy-mockup-code>')
        ->assertSee('npm test')
        ->assertDontSee('npm i daisyui');

    $this
        ->blade('<x-lazy-mockup-code :lines="[[\'prefix\' => \'$\', \'code\' => \'npm i daisyui\'], [\'prefix\' => \'>\', \'code\' => \'installing...\', \'state\' => \'warning\'], [\'prefix\' => \'>\', \'code\' => \'Done!\', \'state\' => \'success\'], [\'prefix\' => \'3\', \'code\' => \'Error!\', \'state\' => \'error\']]" />')
        ->assertSee('data-prefix="$"', false)
        ->assertSee('data-prefix="&gt;"', false)
        ->assertSee('bg-warning text-warning-content', false)
        ->assertSee('bg-success text-success-content', false)
        ->assertSee('bg-error text-error-content', false)
        ->assertSee('Error!');

    $this
        ->blade('<x-lazy-mockup-window>Window content</x-lazy-mockup-window>')
        ->assertSee('Window content')
        ->assertDontSee('Hello!');
});

it('covers every daisyUI 5 component family with a Lazy UI wrapper or integrated modifier', function (string $component, string $class) {
    $this
        ->blade("<x-lazy-{$component} />")
        ->assertSee($class);
})->with([
    ['accordion', 'collapse'],
    ['alert', 'alert'],
    ['aura', 'aura'],
    ['avatar', 'avatar'],
    ['badge', 'badge'],
    ['breadcrumbs', 'breadcrumbs'],
    ['btn', 'btn'],
    ['calendar', 'input'],
    ['card', 'card'],
    ['carousel', 'carousel'],
    ['chat', 'chat'],
    ['checkbox', 'checkbox'],
    ['collapse', 'collapse'],
    ['countdown', 'countdown'],
    ['diff', 'diff'],
    ['divider', 'divider'],
    ['dock', 'dock'],
    ['drawer', 'drawer'],
    ['dropdown', 'dropdown'],
    ['fab', 'fab'],
    ['fieldset', 'fieldset'],
    ['file-input', 'file-input'],
    ['filter', 'filter'],
    ['footer', 'footer'],
    ['hero', 'hero'],
    ['hover-3d', 'hover-3d'],
    ['hover-gallery', 'hover-gallery'],
    ['indicator', 'indicator'],
    ['input', 'input'],
    ['join', 'join'],
    ['kbd', 'kbd'],
    ['label', 'label'],
    ['list', 'list'],
    ['loading', 'loading'],
    ['mask', 'mask'],
    ['megamenu', 'megamenu'],
    ['menu-list', 'menu'],
    ['mockup-browser', 'mockup-browser'],
    ['mockup-code', 'mockup-code'],
    ['mockup-phone', 'mockup-phone'],
    ['mockup-window', 'mockup-window'],
    ['modal', 'modal'],
    ['navbar', 'navbar'],
    ['otp', 'otp'],
    ['pagination', 'join'],
    ['progress', 'progress'],
    ['radial', 'radial-progress'],
    ['radio', 'radio'],
    ['range', 'range'],
    ['rating', 'rating'],
    ['select', 'select'],
    ['skeleton', 'skeleton'],
    ['stack', 'stack'],
    ['stat', 'stat'],
    ['status', 'status'],
    ['steps', 'steps'],
    ['swap', 'swap'],
    ['tabs', 'tabs'],
    ['table', 'table'],
    ['text-rotate', 'text-rotate'],
    ['textarea', 'textarea'],
    ['theme-controller', 'theme-controller'],
    ['timeline', 'timeline'],
    ['toast', 'toast'],
    ['toggle', 'toggle'],
    ['tooltip', 'tooltip'],
]);

it('exposes new daisyUI 5 modifiers without requiring manual class names', function () {
    $this
        ->blade('<x-lazy-dropdown center bottom close />')
        ->assertSee('dropdown-center')
        ->assertSee('dropdown-bottom')
        ->assertSee('dropdown-close');

    $this
        ->blade('<x-lazy-modal top end />')
        ->assertSee('modal-top')
        ->assertSee('modal-end');

    $this
        ->blade('<x-lazy-stack top start />')
        ->assertSee('stack-top')
        ->assertSee('stack-start');

    $this
        ->blade('<x-lazy-alert success soft dash>Saved</x-lazy-alert>')
        ->assertSee('alert-success')
        ->assertSee('alert-soft')
        ->assertSee('alert-dash');

    $this
        ->blade('<x-lazy-step><x-slot:icon>1</x-slot:icon>Done</x-lazy-step>')
        ->assertSee('step-icon')
        ->assertSee('Done');

    $this
        ->blade('<x-lazy-tooltip><x-slot:content>Rich tip</x-slot:content>Hover</x-lazy-tooltip>')
        ->assertSee('tooltip-content')
        ->assertSee('Rich tip');
});

it('builds complete accessible rating markup from semantic props', function () {
    $this
        ->blade('<x-lazy-rating name="rating-10" :items="5" :value="2" type="star-2" size="lg" clearable />')
        ->assertSee('rating rating-lg', false)
        ->assertSee('name="rating-10"', false)
        ->assertSee('class="rating-hidden"', false)
        ->assertSee('aria-label="clear"', false)
        ->assertSee('class="mask mask-star-2"', false)
        ->assertSee('aria-label="1 star"', false)
        ->assertSee('aria-label="2 stars"', false)
        ->assertSee('value="2"', false)
        ->assertSee('checked', false);

    $this
        ->blade('<x-lazy-rating name="score" :items="5" :value="3" type="heart" readonly />')
        ->assertSee('mask-heart')
        ->assertSee('aria-current="true"', false)
        ->assertDontSee('type="radio"', false);

    $this
        ->blade('<x-lazy-rating name="score" :items="5" :value="2.5" half clearable wire:model.live="score" />')
        ->assertSee('rating-half')
        ->assertSee('mask-half-1')
        ->assertSee('mask-half-2')
        ->assertSee('wire:model.live="score"', false);
});

it('generates data-driven component markup from semantic props', function () {
    $this
        ->blade('<x-lazy-steps :items="[[\'label\' => \'Start\'], [\'label\' => \'Done\']]" :current="2" />')
        ->assertSee('Start')
        ->assertSee('Done')
        ->assertSee('step-primary');

    $this
        ->blade('<x-lazy-pagination :current="2" :total="3" url="/page/{page}" />')
        ->assertSee('href="/page/1"', false)
        ->assertSee('href="/page/2"', false)
        ->assertSee('btn-active');

    $this
        ->blade('<x-lazy-stats :items="[[\'title\' => \'Users\', \'value\' => 42, \'description\' => \'Active\']]" />')
        ->assertSee('Users')
        ->assertSee('42')
        ->assertSee('Active');

    $this
        ->blade('<x-lazy-table :headers="[\'Name\', \'Role\']" :rows="[[\'Yurii\', \'Admin\']]" zebra />')
        ->assertSee('table-zebra')
        ->assertSee('<th>Name</th>', false)
        ->assertSee('<td>Yurii</td>', false);

    $this
        ->blade('<x-lazy-filter :options="[\'all\' => \'All\', \'active\' => \'Active\']" value="active" />')
        ->assertSee('value="active"', false)
        ->assertSee('checked', false);
});

it('generates collection components from semantic data', function () {
    $this
        ->blade('<x-lazy-select :options="[[\'value\' => 1, \'label\' => \'One\'], [\'value\' => 2, \'label\' => \'Two\']]" :value="2" />')
        ->assertSee('value="2"', false)
        ->assertSee('selected', false)
        ->assertSee('Two');

    $this
        ->blade('<x-lazy-tabs :items="[[\'label\' => \'Overview\', \'content\' => \'Summary\'], [\'label\' => \'Settings\']]" active="0" boxed />')
        ->assertSee('tabs-box')
        ->assertSee('tab-active')
        ->assertSee('Summary');

    $this
        ->blade('<x-lazy-carousel :items="[[\'src\' => \'/one.jpg\', \'alt\' => \'One\'], [\'content\' => \'Second\']]" />')
        ->assertSee('carousel-item')
        ->assertSee('src="/one.jpg"', false)
        ->assertSee('Second');

    $this
        ->blade('<x-lazy-accordion :items="[[\'title\' => \'First\', \'content\' => \'Body\', \'active\' => true], [\'title\' => \'Second\']]" />')
        ->assertSee('First')
        ->assertSee('Body')
        ->assertSee('checked', false);

    $this
        ->blade('<x-lazy-breadcrumbs :items="[[\'label\' => \'Home\', \'href\' => \'/\'], [\'label\' => \'Current\']]" />')
        ->assertSee('href="/"', false)
        ->assertSee('aria-current="page"', false);

    $this
        ->blade('<x-lazy-dock :items="[[\'label\' => \'Home\', \'href\' => \'/\', \'active\' => true]]" />')
        ->assertSee('dock-active')
        ->assertSee('dock-label')
        ->assertSee('href="/"', false);
});

it('generates interactive controls from semantic props', function () {
    $this
        ->blade('<x-lazy-swap name="enabled" value="yes" checked on-label="ON" off-label="OFF" />')
        ->assertSee('type="checkbox"', false)
        ->assertSee('name="enabled"', false)
        ->assertSee('checked', false)
        ->assertSee('swap-on')
        ->assertSee('swap-off');

    $this
        ->blade('<x-lazy-otp name="code" :length="4" value="1234" wire:model.live="code" />')
        ->assertSee('maxlength="4"', false)
        ->assertSee('wire:model.live="code"', false)
        ->assertSee('inputmode="numeric"', false);

    $this
        ->blade('<x-lazy-range :min="0" :max="10" :steps="6" neutral xl vertical />')
        ->assertSee('range-neutral')
        ->assertSee('range-xl')
        ->assertSee('range-vertical')
        ->assertSee('step="2"', false);

    $this
        ->blade('<x-lazy-radial :value="75" size="4rem" thickness="4px" color="success" label="75 percent" />')
        ->assertSee('radial-progress')
        ->assertSee('text-success')
        ->assertSee('--size: 4rem', false)
        ->assertSee('--thickness: 4px', false)
        ->assertSee('75 percent');
});

it('keeps Blade templates presentation-only without server-side php blocks', function () {
    $iterator = new \RecursiveIteratorIterator(
        new \RecursiveDirectoryIterator(dirname(__DIR__, 2).'/resources/views')
    );

    foreach ($iterator as $file) {
        if (! $file->isFile() || ! str_ends_with($file->getFilename(), '.blade.php')) {
            continue;
        }

        expect(file_get_contents($file->getPathname()))
            ->not->toContain('@php');
    }
});

it('keeps legacy toast behavior while using daisyUI toast and alert classes', function () {
    $this
        ->blade('<x-lazy-toast />')
        ->assertSee('toast')
        ->assertSee('toast-top')
        ->assertSee('toast-end')
        ->assertSee('alert')
        ->assertSee('$store.toasts.list', false);
});

it('keeps drawer hero and indicator defaults compatible but configurable', function () {
    $this
        ->blade('<x-lazy-drawer drawer-content="Menu">Content</x-lazy-drawer>')
        ->assertSee('drawer')
        ->assertSee('menu')
        ->assertSee('w-80')
        ->assertSee('p-4')
        ->assertSee('bg-base-100')
        ->assertSee('Menu')
        ->assertSee('Content');

    $this
        ->blade('<x-lazy-drawer width="lg" padding="sm" background="base-200" end drawer-content="Menu" />')
        ->assertSee('drawer-end')
        ->assertSee('w-96')
        ->assertSee('p-2')
        ->assertSee('bg-base-200');

    $this
        ->blade('<x-lazy-hero title="Hello" description="World" />')
        ->assertSee('hero')
        ->assertSee('bg-base-200')
        ->assertSee('text-center')
        ->assertSee('max-w-md')
        ->assertSee('text-5xl')
        ->assertSee('py-6');

    $this
        ->blade('<x-lazy-hero background="primary" align="start" width="lg" title-size="sm" spacing="sm" title="Hello" />')
        ->assertSee('bg-primary')
        ->assertSee('text-primary-content')
        ->assertSee('text-left')
        ->assertSee('max-w-lg')
        ->assertSee('text-3xl');

    $this
        ->blade('<x-lazy-indicator indicator="5">Inbox</x-lazy-indicator>')
        ->assertSee('indicator-item')
        ->assertSee('badge')
        ->assertSee('badge-secondary')
        ->assertSee('Inbox');

    $this
        ->blade('<x-lazy-indicator indicator="5" primary lg horizontal="start" vertical="bottom">Inbox</x-lazy-indicator>')
        ->assertSee('indicator-start')
        ->assertSee('indicator-bottom');
});

it('keeps legacy drawer hero and indicator view paths as adapters', function () {
    expect(file_get_contents(dirname(__DIR__, 2).'/resources/views/components/drawer.blade.php'))
        ->toContain("@include('lazy::drawer')")
        ->and(file_get_contents(dirname(__DIR__, 2).'/resources/views/components/hero.blade.php'))
        ->toContain("@include('lazy::hero')")
        ->and(file_get_contents(dirname(__DIR__, 2).'/resources/views/components/indicator.blade.php'))
        ->toContain("@include('lazy::indicator')");
});

it('generates independent drawer toggle ids and allows explicit ids', function () {
    $first = (string) $this->blade('<x-lazy-drawer />');
    $second = (string) $this->blade('<x-lazy-drawer />');

    preg_match('/id="([^"]+)"/', $first, $firstId);
    preg_match('/id="([^"]+)"/', $second, $secondId);

    expect($firstId[1] ?? null)->not->toBeNull()
        ->and($secondId[1] ?? null)->not->toBeNull()
        ->and($firstId[1])->not->toBe($secondId[1]);

    $this
        ->blade('<x-lazy-drawer id="settings-drawer" />')
        ->assertSee('id="settings-drawer"', false)
        ->assertSee('for="settings-drawer"', false);
});

it('supports reusable dropdown positioning and content customization', function () {
    $this
        ->blade('<x-lazy-dropdown position="end" width="w-56" content-class="max-h-96 overflow-y-auto" label="Language">Item</x-lazy-dropdown>')
        ->assertSee('dropdown-end')
        ->assertSee('w-56')
        ->assertSee('max-h-96')
        ->assertSee('overflow-y-auto')
        ->assertSee('Language')
        ->assertSee('Item');

    $this
        ->blade('<x-lazy-dropdown end :content-defaults="false" width="w-80" content-class="bg-base-200 shadow-2xl">Panel</x-lazy-dropdown>')
        ->assertSee('dropdown-end')
        ->assertSee('dropdown-content')
        ->assertSee('w-80')
        ->assertSee('bg-base-200')
        ->assertSee('shadow-2xl')
        ->assertDontSee('bg-base-100');
});

it('supports linked and hoverable cards for admin navigation', function () {
    $this
        ->blade('<x-lazy-card href="/admin/users" hover title="Users">42</x-lazy-card>')
        ->assertSee('<a', false)
        ->assertSee('href="/admin/users"', false)
        ->assertSee('hover:shadow-md', false)
        ->assertSee('card-title')
        ->assertSee('Users')
        ->assertSee('42');
});


it('supports externally controlled swap state for Alpine or other state owners', function () {
    $this
        ->blade('<x-lazy-swap controlled rotate x-bind:class="{ \'swap-active\': open }"><x-slot:on>On</x-slot:on><x-slot:off>Off</x-slot:off></x-lazy-swap>')
        ->assertSee('<div', false)
        ->assertSee('swap-rotate')
        ->assertSee('x-bind:class', false)
        ->assertSee('swap-on')
        ->assertSee('swap-off')
        ->assertDontSee('type="checkbox"', false);
});

it('supports rich collapse summaries and content classes', function () {
    $this
        ->blade('<x-lazy-collapse summary-class="text-lg font-semibold" content-class="space-y-5"><x-slot:summary><span>Permissions</span><small>12 total</small></x-slot:summary>Body</x-lazy-collapse>')
        ->assertSee('collapse-arrow')
        ->assertSee('text-lg')
        ->assertSee('font-semibold')
        ->assertSee('space-y-5')
        ->assertSee('Permissions')
        ->assertSee('12 total')
        ->assertSee('Body');
});
