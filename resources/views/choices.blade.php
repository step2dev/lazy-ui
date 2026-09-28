@props([
    'options' => [],
    'label' => '',
    'placeholder' => 'Please select a value',
    'value' => null,
    'unstyled' => false,
])

@php
    $model = $attributes->wire('model');
    $parameter = $model->value();
    $modelAttributes = $attributes->whereStartsWith('wire:model');

    $optionsExpression = is_string($options)
        ? ($options ?: '[]')
        : '[]';

    $nativeAttributes = $attributes->only([
        'id',
        'name',
        'required',
        'disabled',
        'form',
    ]);

    $visualAttributes = $attributes->except([
        ...array_keys($modelAttributes->getAttributes()),
        'id',
        'name',
        'required',
        'disabled',
        'form',
        'value',
        'options',
        'label',
        'placeholder',
        'unstyled',
    ]);
@endphp

<div
    {{ $visualAttributes->class([
        'fieldset' => ! $unstyled,
        'w-full' => ! $unstyled,
    ]) }}
    @if ($parameter)
        x-data="{ defaultValue: @entangle($model) }"
    @else
        x-data="{ defaultValue: @js($value) }"
    @endif
    wire:ignore
>
    <div
        x-model="defaultValue"
        x-data="select({!! $optionsExpression !!}, defaultValue, @js($placeholder))"
        class="relative"
    >
        @if ($label)
            <label
                @if ($nativeAttributes->get('id')) for="{{ $nativeAttributes->get('id') }}" @endif
                @class(['label' => ! $unstyled])
                @click="$refs.button.focus()"
            >
                {{ $label }}
            </label>
        @endif

        <select
            x-ref="native"
            {{ $nativeAttributes->class(['sr-only' => ! $unstyled]) }}
            tabindex="-1"
            aria-hidden="true"
        >
            @if ($placeholder)
                <option value="" data-lazy-placeholder>{{ $placeholder }}</option>
            @endif

            @if (is_array($options))
                @foreach ($options as $key => $option)
                    @php
                        if (is_array($option)) {
                            $optionValue = $option['value'] ?? $key;
                            $optionLabel = $option['label'] ?? $option['text'] ?? $optionValue;
                            $optionDisabled = (bool) ($option['disabled'] ?? false);
                        } else {
                            $optionValue = is_int($key) ? $option : $key;
                            $optionLabel = $option;
                            $optionDisabled = false;
                        }
                    @endphp
                    <option value="{{ $optionValue }}" @disabled($optionDisabled)>{{ $optionLabel }}</option>
                @endforeach
            @endif

            {{ $slot }}
        </select>

        <button
            x-bind="button"
            type="button"
            @class([
                'select w-full flex items-center justify-between text-left cursor-pointer' => ! $unstyled,
            ])
            @disabled($nativeAttributes->get('disabled'))
        >
            <span class="block truncate" x-bind="selectedItemLabel"></span>

            <svg
                x-bind="caretIcon"
                class="h-4 w-4 shrink-0 transition-transform"
                xmlns="http://www.w3.org/2000/svg"
                viewBox="0 0 20 20"
                fill="currentColor"
                aria-hidden="true"
            >
                <path fill-rule="evenodd" d="M5.23 7.21a.75.75 0 011.06.02L10 11.168l3.71-3.938a.75.75 0 111.08 1.04l-4.25 4.512a.75.75 0 01-1.08 0L5.21 8.27a.75.75 0 01.02-1.06z" clip-rule="evenodd" />
            </svg>
        </button>

        <ul
            x-bind="listbox"
            role="listbox"
            tabindex="-1"
            @class([
                'menu dropdown-content bg-base-100 rounded-box z-50 mt-1 max-h-60 w-full overflow-auto p-2 shadow-lg' => ! $unstyled,
            ])
            style="display: none"
        >
            <template x-bind="list">
                <li role="option" x-bind="listItem">
                    <button type="button">
                        <span class="block truncate" x-bind="listItemLabel"></span>

                        <svg
                            x-bind="listItemCheckIcon"
                            class="ml-auto h-4 w-4"
                            xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 20 20"
                            fill="currentColor"
                            aria-hidden="true"
                        >
                            <path fill-rule="evenodd" d="M16.704 5.29a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4A1 1 0 014.704 9.29L8 12.586l7.296-7.296a1 1 0 011.408 0z" clip-rule="evenodd" />
                        </svg>
                    </button>
                </li>
            </template>
        </ul>
    </div>
</div>
