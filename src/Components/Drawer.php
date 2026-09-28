<?php

namespace Step2dev\LazyUI\Components;

class Drawer extends DaisyComponent
{
    protected const VIEW = 'lazy::drawer';

    public function __construct(public mixed $drawerContent = null) {}
}
