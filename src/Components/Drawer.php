<?php

namespace Step2dev\LazyUI\Components;

use Illuminate\Support\Str;

class Drawer extends DaisyComponent
{
    protected const VIEW = 'lazy::drawer';

    public string $id;

    public function __construct(
        public mixed $drawerContent = null,
        ?string $id = null,
    ) {
        $this->id = $id ?: 'lazy-drawer-'.Str::uuid();
    }
}
