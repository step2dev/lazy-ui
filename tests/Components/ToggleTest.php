<?php
//
// namespace Lazyadm\LazyComponent\Tests\Components;
//
// it('can render checkbox', function () {
//     $this
//         ->blade('<x-lazy-toggle />')
//         ->assertSee('toggle')
//         ->assertSee('type="checkbox"', false);
// });
//
// it('can render checkbox with label', function () {
//     $this
//         ->blade('<x-lazy-toggle label="toggle Label" name="name"/>')
//         ->assertSee('toggle')
//         ->assertSee('type="checkbox"', false)
//         ->assertSee('name="name"', false)
//         ->assertSee('checkbox Label')
//         ->assertDontSee('label="toggle Label"', false);
// })->todo();
//
// it('can render checkbox with slot', function () {
//     $this
//         ->blade('<x-lazy-toggle name="name">checkbox Label</x-lazy-toggle>')
//         ->assertSee('toggle')
//         ->assertSee('type="checkbox"', false)
//         ->assertSee('name="name"', false)
//         ->assertSee('checkbox Label')
//         ->assertDontSee('label="checkbox Label"', false);
// })->todo();
//
// it('can render checkbox with colors', function ($parameter, $class) {
//     $this
//         ->blade("<x-lazy-toggle name=\"name\" {$parameter}  />")
//         ->assertSee('toggle')
//         ->assertSee('type="checkbox"', false)
//         ->assertSee('name="name"', false)
//         ->assertSee($class);
// })->with([
//     'primary' => ['primary', 'toggle-primary'],
//     'secondary' => ['secondary', 'toggle-secondary'],
//     'accent' => ['accent', 'toggle-accent'],
//     'info' => ['info', 'toggle-info'],
//     'success' => ['success', 'toggle-success'],
//     'warning' => ['warning', 'toggle-warning'],
//     'error' => ['error', 'toggle-error'],
// ]);
//
// it('can render checkbox with colors param', function ($parameter, $class) {
//     $this
//         ->blade("<x-lazy-toggle name=\"name\" color=\"{$parameter}\"  />")
//         ->assertSee('toggle')
//         ->assertSee('type="checkbox"', false)
//         ->assertSee('name="name"', false)
//         ->assertSee($class)
//         ->assertDontSee("color=\"{$parameter}\"", false);
// })->with([
//     'primary' => ['primary', 'toggle-primary'],
//     'secondary' => ['secondary', 'toggle-secondary'],
//     'accent' => ['accent', 'toggle-accent'],
//     'info' => ['info', 'toggle-info'],
//     'success' => ['success', 'toggle-success'],
//     'warning' => ['warning', 'toggle-warning'],
//     'error' => ['error', 'toggle-error'],
// ]);
//
//
