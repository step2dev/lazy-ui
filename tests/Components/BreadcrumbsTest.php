<?php

it('can render breadcrumbs', function () {
    $this
        ->blade('<x-lazy-breadcrumbs>
    <ul>
    <li><a href="#">Home</a></li>
    <li><a href="#">Library</a></li>
    <li>Data</li>
</ul>
    </x-lazy-breadcrumbs>')
        ->assertSee('class="text-sm breadcrumbs"', false)
        ->assertSee('Home')
        ->assertSee('Library')
        ->assertSee('Data');
});
