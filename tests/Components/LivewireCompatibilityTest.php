<?php

namespace Step2dev\LazyUI\Tests\Components;

it('preserves Livewire model attributes on native form controls', function () {
    $this->blade('<x-lazy-input wire:model.live="name" />')
        ->assertSee('wire:model.live="name"', false);

    $this->blade('<x-lazy-select wire:model.live="country" :options="[\'ua\' => \'Ukraine\']" />')
        ->assertSee('wire:model.live="country"', false);

    $this->blade('<x-lazy-textarea wire:model.blur="bio" />')
        ->assertSee('wire:model.blur="bio"', false);

    $this->blade('<x-lazy-checkbox wire:model.live="enabled" />')
        ->assertSee('wire:model.live="enabled"', false);

    $this->blade('<x-lazy-radio wire:model="type" value="one" />')
        ->assertSee('wire:model="type"', false);

    $this->blade('<x-lazy-range wire:model.live="volume" :min="0" :max="10" />')
        ->assertSee('wire:model.live="volume"', false);
});

it('propagates Livewire state to generated interactive inputs', function () {
    $rating = (string) $this->blade('<x-lazy-rating wire:model.live="score" :items="5" />');

    expect(substr_count($rating, 'wire:model.live="score"'))->toBe(5);

    $this->blade('<x-lazy-otp wire:model.live="code" :length="4" />')
        ->assertSee('wire:model.live="code"', false);

    $this->blade('<x-lazy-swap wire:model.live="enabled" on-label="On" off-label="Off" />')
        ->assertSee('wire:model.live="enabled"', false);
});

it('bridges Choices to Livewire through Alpine entanglement', function () {
    $html = (string) $this->blade(
        '<x-lazy-choices wire:model.live="country" :options="[\'ua\' => \'Ukraine\', \'pl\' => \'Poland\']" />'
    );

    expect($html)
        ->toContain('$wire.entangle')
        ->toContain('country')
        ->toContain('.live');
});
