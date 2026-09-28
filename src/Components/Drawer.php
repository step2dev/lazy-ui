<?php

namespace Step2dev\LazyUI\Components;

use Illuminate\Support\Str;
use Illuminate\View\ComponentAttributeBag;

class Drawer extends DaisyComponent
{
    protected const VIEW = 'lazy::drawer';

    public string $id;

    public array $sideClasses;

    public function __construct(
        public mixed $drawerContent = null,
        ?string $id = null,
        public bool $open = false,
        public bool $end = false,
        public bool $menu = true,
        public string $width = 'md',
        public string $padding = 'md',
        public string $background = 'base-100',
    ) {
        $this->id = $id ?: 'lazy-drawer-'.Str::uuid();

        $widths = ['xs' => 'w-56', 'sm' => 'w-64', 'md' => 'w-80', 'lg' => 'w-96', 'full' => 'w-full'];
        $paddings = ['none' => 'p-0', 'xs' => 'p-1', 'sm' => 'p-2', 'md' => 'p-4', 'lg' => 'p-6'];
        $backgrounds = [
            'none' => '',
            'base-100' => 'bg-base-100',
            'base-200' => 'bg-base-200',
            'base-300' => 'bg-base-300',
            'neutral' => 'bg-neutral text-neutral-content',
            'primary' => 'bg-primary text-primary-content',
            'secondary' => 'bg-secondary text-secondary-content',
        ];

        $this->sideClasses = [
            'menu' => $this->menu,
            $widths[$this->width] ?? $widths['md'],
            $paddings[$this->padding] ?? $paddings['md'],
            $backgrounds[$this->background] ?? $backgrounds['base-100'],
        ];
    }

    protected function componentClasses(array $data, ComponentAttributeBag $attributes): array
    {
        return ['drawer', 'drawer-end' => $this->end];
    }
}
