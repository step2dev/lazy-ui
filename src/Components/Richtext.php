<?php

namespace Step2dev\LazyUI\Components;

use Illuminate\Contracts\View\View;
use Illuminate\Support\Js;
use Step2dev\LazyUI\DTO\RichText\QuillOptions;
use Step2dev\LazyUI\LazyComponent;

class Richtext extends LazyComponent
{
    public bool $autoFocus = false;

    public bool $readonly = false;

    public function __construct(public string $placeholder = '', public bool $required = false, public ?QuillOptions $quillOptions = null)
    {
        $this->placeholder = (string) str($placeholder)->trim()->ucfirst();
        $this->quillOptions = $quillOptions ?? QuillOptions::defaults();
    }

    protected function allowedColors(): array
    {
        return [
            ...parent::allowedColors(),
            'no-border',
            'ghost',
        ];
    }

    public function render(): \Closure|View
    {
        return function (array $data) {
            $attributes = $this->getAttributesFromData($data);
            $attributes['required'] = $this->required;
            $data['attributes'] = $attributes;
            $data['options'] = $this->options();

            $color = $this->getColorByAttribute($attributes);
            $size = $this->getSizeByAttribute($attributes);

            return view('lazy::richtext', $this->mergeData($data, [
                'textarea',
                'textarea-ghost' => $color === 'ghost' || $color === 'no-border',
                'textarea-neutral' => $color === 'neutral',
                'textarea-primary' => $color === 'primary',
                'textarea-secondary' => $color === 'secondary',
                'textarea-accent' => $color === 'accent',
                'textarea-info' => $color === 'info',
                'textarea-success' => $color === 'success',
                'textarea-warning' => $color === 'warning',
                'textarea-error' => $color === 'error',
                'textarea-xl' => $size === 'xl',
                'textarea-lg' => $size === 'lg',
                'textarea-md' => $size === 'md',
                'textarea-sm' => $size === 'sm',
                'textarea-xs' => $size === 'xs',
            ], [
                'color',
                'size',
            ]))->render();
        };
    }

    public function options(): Js
    {
        return Js::from([
            'autofocus' => $this->autoFocus,
            'theme' => $this->quillOptions->theme,
            'readOnly' => $this->readonly,
            'placeholder' => $this->placeholder,
            'toolbar' => $this->quillOptions->getToolbar(),
        ]);
    }
}
