<?php

namespace Step2dev\LazyUI\Components;

use Illuminate\View\ComponentAttributeBag;

class Hero extends DaisyComponent
{
    protected const VIEW = 'lazy::hero';

    public array $contentClasses;
    public array $innerClasses;
    public array $titleClasses;
    public array $spacingClasses;

    public function __construct(
        public string $title = '',
        public string $description = '',
        public string $background = 'base-200',
        public string $align = 'center',
        public string $width = 'md',
        public string $titleSize = 'lg',
        public string $spacing = 'md',
    ) {
        $aligns = ['start' => 'text-left', 'center' => 'text-center', 'end' => 'text-right'];
        $widths = ['none' => '', 'sm' => 'max-w-sm', 'md' => 'max-w-md', 'lg' => 'max-w-lg', 'xl' => 'max-w-xl', 'full' => 'max-w-none'];
        $sizes = ['xs' => 'text-2xl', 'sm' => 'text-3xl', 'md' => 'text-4xl', 'lg' => 'text-5xl', 'xl' => 'text-6xl'];
        $spacings = ['none' => '', 'xs' => 'py-2', 'sm' => 'py-4', 'md' => 'py-6', 'lg' => 'py-8'];

        $this->contentClasses = ['hero-content', $aligns[$this->align] ?? $aligns['center']];
        $this->innerClasses = [$widths[$this->width] ?? $widths['md']];
        $this->titleClasses = ['font-bold', $sizes[$this->titleSize] ?? $sizes['lg']];
        $this->spacingClasses = [$spacings[$this->spacing] ?? $spacings['md']];
    }

    protected function componentClasses(array $data, ComponentAttributeBag $attributes): array
    {
        $backgrounds = [
            'none' => '',
            'base-100' => 'bg-base-100',
            'base-200' => 'bg-base-200',
            'base-300' => 'bg-base-300',
            'neutral' => 'bg-neutral text-neutral-content',
            'primary' => 'bg-primary text-primary-content',
            'secondary' => 'bg-secondary text-secondary-content',
        ];

        return ['hero', $backgrounds[$this->background] ?? $backgrounds['base-200']];
    }
}
