<?php

namespace Step2dev\LazyUI\Tests\Performance;

use Closure;
use Step2dev\LazyUI\Components\Rating;
use Step2dev\LazyUI\Components\Stack;
use Step2dev\LazyUI\Components\Toast;

it('renders a large component set without leaking state', function () {
    $template = '<div>';

    for ($i = 0; $i < 100; $i++) {
        $template .= '<x-lazy-btn primary data-index="'.$i.'">Button '.$i.'</x-lazy-btn>';
        $template .= '<x-lazy-badge success>Badge '.$i.'</x-lazy-badge>';
    }

    $template .= '</div>';

    $html = (string) $this->blade($template);

    expect(substr_count($html, 'data-index='))
        ->toBe(100)
        ->and(substr_count($html, 'btn-primary'))
        ->toBeGreaterThanOrEqual(100)
        ->and(substr_count($html, 'badge-success'))
        ->toBeGreaterThanOrEqual(100);
});

it('uses the shared daisy renderer for presentation-only components', function () {
    expect((new Rating)->render())->toBeInstanceOf(Closure::class)
        ->and((new Stack)->render())->toBeInstanceOf(Closure::class)
        ->and((new Toast)->render())->toBeInstanceOf(Closure::class);
});
