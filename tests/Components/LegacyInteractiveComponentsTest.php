<?php

namespace Step2dev\LazyUI\Tests\Components;

it('keeps the legacy tooltip API with daisyUI 5 classes', function () {
    $this
        ->blade('<x-lazy-tooltip bottom info tip="Manual generate site map" class="join-item"><x-lazy-btn ghost>Generate</x-lazy-btn></x-lazy-tooltip>')
        ->assertSee('tooltip')
        ->assertSee('tooltip-bottom')
        ->assertSee('tooltip-info')
        ->assertSee('join-item')
        ->assertSee('data-tip="Manual generate site map"', false)
        ->assertSee('Generate');
});

it('supports rich tooltip content without breaking the legacy tip API', function () {
    $this
        ->blade('<x-lazy-tooltip tip="Fallback"><x-slot:content><strong>Rich tip</strong></x-slot:content>Hover</x-lazy-tooltip>')
        ->assertSee('tooltip')
        ->assertSee('tooltip-content')
        ->assertSee('<strong>Rich tip</strong>', false)
        ->assertSee('data-tip="Fallback"', false);
});

it('keeps choices as an interactive Alpine listbox with array options', function () {
    $this
        ->blade('<x-lazy-choices label="Category" :options="[[\'value\' => 1, \'label\' => \'News\'], [\'value\' => 2, \'label\' => \'Tech\']]" :value="2" />')
        ->assertSee('x-data="select(', false)
        ->assertSee('x-bind="button"', false)
        ->assertSee('x-bind="listbox"', false)
        ->assertSee('role="listbox"', false)
        ->assertSee('class="select', false)
        ->assertSee('value="1"', false)
        ->assertSee('News')
        ->assertSee('Tech');
});

it('keeps choices option slot compatibility without server-side html parsing', function () {
    $this
        ->blade('<x-lazy-choices label="Locale"><option value="uk">Українська</option><option value="en">English</option></x-lazy-choices>')
        ->assertSee('x-ref="native"', false)
        ->assertSee('value="uk"', false)
        ->assertSee('Українська')
        ->assertSee('value="en"', false)
        ->assertSee('English');
});

it('keeps legacy raw javascript choices options for backwards compatibility', function () {
    $this
        ->blade('<x-lazy-choices options="[{\'label\':\'One\',\'value\':1}]" />')
        ->assertSee("select([{'label':'One','value':1}], defaultValue", false);
});

it('keeps old tabs, avatar and range contracts while translating to daisyUI 5', function () {
    $this
        ->blade('<x-lazy-tabs type="lifted" size="sm"><x-lazy-tab active>Tab</x-lazy-tab></x-lazy-tabs>')
        ->assertSee('tabs-lift')
        ->assertSee('tabs-sm')
        ->assertSee('tab-active')
        ->assertSee('Tab');

    $this
        ->blade('<x-lazy-avatar online sm src="avatar.jpg" />')
        ->assertSee('avatar-online')
        ->assertSee('w-16')
        ->assertSee('src="avatar.jpg"', false);

    $this
        ->blade('<x-lazy-range primary :steps="5" />')
        ->assertSee('range-primary')
        ->assertSee('step="25"', false);
});

it('keeps Lazy UI frontend modules self contained', function () {
    $source = file_get_contents(dirname(__DIR__, 2).'/resources/js/lazy.js');
    $choices = file_get_contents(dirname(__DIR__, 2).'/resources/js/components/select.js');

    expect($source)
        ->toContain("import './components/select'")
        ->and($choices)
        ->toContain("Alpine.data('select'")
        ->toContain("this.$dispatch('input', item.value)")
        ->not->toContain('console.log');
});
