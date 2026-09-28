let quillPromise;

async function loadQuill() {
    if (typeof window.Quill === 'function') {
        return window.Quill;
    }

    quillPromise ??= Promise.all([
        import('quill'),
        import('quill/dist/quill.snow.css'),
    ]).then(([module]) => {
        window.Quill = module.default;

        return module.default;
    });

    return quillPromise;
}

document.addEventListener('alpine:init', () => {
    Alpine.data('quill', ({__value, options, __config, onTextChange, onInit}) => ({
        __ready: false,
        __value,
        __quill: undefined,

        init() {
            queueMicrotask(async () => {
                const Quill = await loadQuill();

                if (!this.$refs.quill?.isConnected) {
                    return;
                }

                this.__quill = new Quill(this.$refs.quill, this.__quillOptions());
                this.__quill.root.innerHTML = this.__value ?? '';

                this.__quill.on('text-change', () => {
                    if (typeof onTextChange === 'function' && onTextChange(this) === false) {
                        return;
                    }

                    this.__value = this.__quill.root.innerHTML;
                    this.$dispatch('input', this.__value);
                });

                this.__ready = true;

                if (options.autofocus) {
                    this.$nextTick(() => this.focus());
                }

                if (typeof onInit === 'function') {
                    onInit(this);
                }
            });
        },

        focus() {
            if (this.__ready) {
                this.__quill.focus();
            }
        },

        __quillOptions() {
            const config = __config(this, options);
            const toolbarHandlers = config.toolbarHandlers ?? {};
            const modules = config.modules ?? {};

            delete config.toolbarHandlers;
            delete config.modules;

            return {
                theme: options.theme,
                readOnly: options.readOnly,
                placeholder: options.placeholder,
                modules: {
                    toolbar: {
                        container: options.toolbar,
                        handlers: toolbarHandlers,
                    },
                    ...modules,
                },
                ...config,
            };
        },
    }));
});
