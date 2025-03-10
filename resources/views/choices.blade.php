@props([
    'options' => null,
    'label' => '',
    'placeholder' => 'Please select a value',
//    'value'=> null
])
@php
    $model = $attributes->wire('model');
    $lazy = $model->hasModifier('lazy');
    $parameter = $model->value();

@endphp
{{--@dd($attributes,$model, $lazy,   $parameter)--}}

<div class="mb-3" x-data="{
    defaultValue: @entangle($model)
}" wire:ignore>
    <div x-model="defaultValue">
        <div
            x-data="select({{ $options }}, defaultValue, '{{ $placeholder }}')">
            <label id="listbox-label" class="form-check-label"
                   @click="$refs.button.focus();">{{ $label }}</label>
            <div class="mt-1 relative">
                <button x-bind="button" type="button"
                        class="relative w-full border border-gray-300 rounded-md shadow-xs pl-3 pr-10 py-2 text-left cursor-default focus:outline-hidden focus:ring-3-1 focus:ring-3-indigo-500 focus:border-indigo-500 sm:text-sm"
                        @listbox-focus.window="$event.detail === '' && $refs.button.click();">
                    <span class="block truncate" x-bind="selectedItemLabel"></span>
                    <span
                        class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none">
                      <i class="fa-solid text-gray-400" x-bind="caretIcon"></i>
                    </span>
                </button>
                <ul x-bind="listbox"
                    class="absolute z-10 mt-1 w-full bg-white shadow-lg max-h-60 rounded-md py-1 text-base ring-3-1 ring-3-black ring-3-opacity-5 overflow-auto focus:outline-hidden sm:text-sm"
                    role="listbox" tabindex="-1">
                    <template x-bind="list" hidden aria-hidden="true">
                        <li x-bind="listItem"
                            class="text-gray-900 cursor-default select-none relative py-2 pl-3 pr-9"
                            role="option"
                        >
                            <span class="font-normal block truncate" x-bind="listItemLabel"></span>
                            <span
                                class="text-indigo-600 absolute inset-y-0 right-0 flex items-center pr-4"
                                x-bind="listItemCheckIcon">
                             <svg class="w-8 h-8" xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                  fill="currentColor" viewBox="0 0 16 16">
                                  <path
                                      d="M10.97 4.97a.75.75 0 0 1 1.07 1.05l-3.99 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.267.267 0 0 1 .02-.022z"></path>
                             </svg>
                            </span>
                        </li>
                    </template>
                </ul>
            </div>
        </div>
    </div>
</div>
