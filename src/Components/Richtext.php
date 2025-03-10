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
        $this->autoFocus = false;
        $this->readonly = false;
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
                //colors
                'textarea-bordered' => ! $color || $color === 'bordered' || $color !== 'no-border',
                'textarea-ghost' => $color === 'ghost',
                'textarea-primary' => $color === 'primary',
                'textarea-secondary' => $color === 'secondary',
                'textarea-accent' => $color === 'accent',
                'textarea-info' => $color === 'info',
                'textarea-success' => $color === 'success',
                'textarea-warning' => $color === 'warning',
                'textarea-error' => $color === 'error',
                //sizes
                'textarea-lg' => $size === 'lg',
                'textarea-md' => $size === 'md',
                'textarea-sm' => $size === 'sm',
                'textarea-xs' => $size === 'xs',
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
