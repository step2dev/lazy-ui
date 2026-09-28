<?php

namespace Step2dev\LazyUI\Tests\Components;

it('keeps legacy shorthand modifiers and aliases working', function () {
    $this->blade('<x-lazy-btn primary sm outline>Save</x-lazy-btn>')
        ->assertSee('btn-primary')
        ->assertSee('btn-sm')
        ->assertSee('btn-outline');

    $this->blade('<x-lazy-badge danger>Danger</x-lazy-badge>')
        ->assertSee('badge-error')
        ->assertDontSee('badge-danger');

    $this->blade('<x-lazy-alert danger soft>Danger</x-lazy-alert>')
        ->assertSee('alert-error')
        ->assertSee('alert-soft');

    $this->blade('<x-lazy-tabs boxed />')
        ->assertSee('tabs-box');

    $this->blade('<x-lazy-loading dots lg primary />')
        ->assertSee('loading-dots')
        ->assertSee('loading-lg')
        ->assertSee('text-primary');

    $this->blade('<x-lazy-divider hr>OR</x-lazy-divider>')
        ->assertSee('divider-horizontal')
        ->assertSee('OR');

    $this->blade('<x-lazy-checkbox neutral xl />')
        ->assertSee('type="checkbox"', false)
        ->assertSee('checkbox-neutral')
        ->assertSee('checkbox-xl');

    $this->blade('<x-lazy-radio success sm />')
        ->assertSee('type="radio"', false)
        ->assertSee('radio-success')
        ->assertSee('radio-sm');
});

it('keeps legacy slot based usage alongside semantic APIs', function () {
    $this->blade('<x-lazy-select placeholder="Choose"><option value="1">One</option></x-lazy-select>')
        ->assertSee('Choose')
        ->assertSee('<option value="1">One</option>', false);

    $this->blade('<x-lazy-tabs boxed><x-lazy-tab active>Profile</x-lazy-tab></x-lazy-tabs>')
        ->assertSee('tabs-box')
        ->assertSee('tab-active')
        ->assertSee('Profile');

    $this->blade('<x-lazy-carousel><x-lazy-carousel-item>Slide</x-lazy-carousel-item></x-lazy-carousel>')
        ->assertSee('carousel')
        ->assertSee('carousel-item')
        ->assertSee('Slide');

    $this->blade('<x-lazy-drawer drawer-content="Menu">Content</x-lazy-drawer>')
        ->assertSee('drawer')
        ->assertSee('Menu')
        ->assertSee('Content');
});

it('keeps unstyled as an opt out for generated presentation classes', function () {
    $this->blade('<x-lazy-card unstyled title="Title">Body</x-lazy-card>')
        ->assertDontSee('card-body')
        ->assertDontSee('card-title');

    $this->blade('<x-lazy-tooltip unstyled tip="Help">Hover</x-lazy-tooltip>')
        ->assertDontSee('tooltip-top');

    $this->blade('<x-lazy-steps unstyled :items="[[\'label\' => \'One\', \'active\' => true]]" />')
        ->assertDontSee('step-primary');
});
