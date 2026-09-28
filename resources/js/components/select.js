document.addEventListener('alpine:init', () => {
    Alpine.data('select', (initialOptions = [], value = null, placeholder = 'Please select a value') => ({
        options: Array.isArray(initialOptions) ? initialOptions : [],
        placeholder,
        value,
        status: false,
        activeIndex: 0,
        selectedIndex: null,
        selectedItem: null,

        init() {
            this.refreshOptions();

            if (this.options.length === 0 && this.$refs.native) {
                this.options = Array.from(this.$refs.native.options)
                    .filter((option) => !option.dataset.lazyPlaceholder)
                    .map((option) => ({
                        value: option.value,
                        label: option.textContent?.trim() ?? option.value,
                        disabled: option.disabled,
                    }));
            } else {
                this.populateNativeOptions();
            }

            this.syncSelection(this.value ?? this.$refs.native?.value ?? null);

            this.$watch('defaultValue', (nextValue) => {
                this.value = nextValue;
                this.syncSelection(nextValue);
            });
        },

        refreshOptions() {
            this.options = this.options.map((option, index) => {
                if (option !== null && typeof option === 'object') {
                    return {
                        value: option.value ?? index,
                        label: option.label ?? option.text ?? option.value ?? index,
                        disabled: Boolean(option.disabled),
                    };
                }

                return {
                    value: option,
                    label: option,
                    disabled: false,
                };
            });
        },

        populateNativeOptions() {
            if (!this.$refs.native || this.options.length === 0) {
                return;
            }

            const existing = Array.from(this.$refs.native.options)
                .filter((option) => !option.dataset.lazyPlaceholder);

            if (existing.length > 0) {
                return;
            }

            this.options.forEach((item) => {
                const option = new Option(item.label, item.value, false, false);
                option.disabled = item.disabled;
                this.$refs.native.add(option);
            });
        },

        syncSelection(nextValue) {
            const normalizedValue = nextValue === null || nextValue === undefined
                ? ''
                : String(nextValue);

            this.selectedIndex = this.options.findIndex(
                (item) => String(item.value) === normalizedValue
            );

            this.selectedItem = this.selectedIndex >= 0
                ? this.options[this.selectedIndex]
                : null;

            if (this.$refs.native) {
                this.$refs.native.value = normalizedValue;
            }
        },

        onClick() {
            if (this.$refs.native?.disabled || this.status) {
                return;
            }

            this.activeIndex = this.selectedIndex >= 0
                ? this.selectedIndex
                : Math.max(this.activeIndex ?? 0, 0);

            this.status = true;

            this.$nextTick(() => {
                this.$refs.listbox?.focus();
            });
        },

        selectItem(item, index) {
            if (!item || item.disabled) {
                return;
            }

            this.selectedIndex = index;
            this.selectedItem = item;
            this.value = item.value;
            this.defaultValue = item.value;
            this.status = false;

            if (this.$refs.native) {
                this.$refs.native.value = item.value;
                this.$refs.native.dispatchEvent(new Event('input', { bubbles: true }));
                this.$refs.native.dispatchEvent(new Event('change', { bubbles: true }));
            }

            this.$dispatch('input', item.value);
        },

        move(direction) {
            if (this.options.length === 0) {
                return;
            }

            let next = this.activeIndex;
            const start = next;

            do {
                next = (next + direction + this.options.length) % this.options.length;
            } while (this.options[next]?.disabled && next !== start);

            this.activeIndex = next;
        },

        button: {
            ['x-ref']: 'button',
            ['role']: 'combobox',
            [':aria-expanded']() {
                return this.status;
            },
            ['@click']() {
                this.onClick();
            },
            ['@keydown.arrow-up.stop.prevent']() {
                this.onClick();
                this.move(-1);
            },
            ['@keydown.arrow-down.stop.prevent']() {
                this.onClick();
                this.move(1);
            },
        },

        listbox: {
            ['x-ref']: 'listbox',
            ['x-show']() {
                return this.status;
            },
            ['@click.outside']() {
                this.status = false;
            },
            ['@keydown.enter.stop.prevent']() {
                if (this.activeIndex === null) {
                    return;
                }

                this.selectItem(this.options[this.activeIndex], this.activeIndex);
                this.$refs.button?.focus();
            },
            ['@keydown.space.stop.prevent']() {
                if (this.activeIndex === null) {
                    return;
                }

                this.selectItem(this.options[this.activeIndex], this.activeIndex);
                this.$refs.button?.focus();
            },
            ['@keydown.escape.stop.prevent']() {
                this.status = false;
                this.$refs.button?.focus();
            },
            ['@keydown.arrow-up.stop.prevent']() {
                this.move(-1);
            },
            ['@keydown.arrow-down.stop.prevent']() {
                this.move(1);
            },
        },

        list: {
            ['x-for']: '(template, index) in options',
        },

        listItem: {
            [':id']() {
                return `option-${this.index}`;
            },
            [':aria-selected']() {
                return this.selectedIndex === this.index;
            },
            [':aria-disabled']() {
                return Boolean(this.template.disabled);
            },
            [':class']() {
                return {
                    'menu-active': this.activeIndex === this.index,
                    'menu-disabled': this.template.disabled,
                };
            },
            ['@click']() {
                this.selectItem(this.template, this.index);
            },
            ['@mouseleave']() {
                this.activeIndex = null;
            },
            ['@mouseenter']() {
                if (!this.template.disabled) {
                    this.activeIndex = this.index;
                }
            },
        },

        listItemLabel: {
            ['x-text']() {
                return this.template.label;
            },
            [':class']() {
                return {
                    'font-semibold': this.selectedIndex === this.index,
                };
            },
        },

        listItemCheckIcon: {
            ['x-show']() {
                return this.selectedIndex === this.index;
            },
        },

        selectedItemLabel: {
            ['x-text']() {
                return this.selectedItem?.label || this.placeholder;
            },
        },

        caretIcon: {
            [':class']() {
                return {
                    'rotate-180': this.status,
                };
            },
        },
    }));
});
