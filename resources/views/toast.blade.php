<div x-data id="toasts" {{ $attributes }}>
    <template x-for="toast in $store.toasts.list" :key="toast.id">
        <div
            role="alert"
            x-show="toast.visible"
            x-transition:enter="transition ease-in duration-200"
            x-transition:enter-start="transform opacity-0 translate-y-2"
            x-transition:enter-end="transform opacity-100"
            x-transition:leave="transition ease-out duration-500"
            x-transition:leave-start="transform translate-x-0 opacity-100"
            x-transition:leave-end="transform translate-x-full opacity-0"
            class="alert relative overflow-hidden shadow-lg"
            :class="{
                'alert-info': toast.type === 'info',
                'alert-success': toast.type === 'success',
                'alert-warning': toast.type === 'warning',
                'alert-error': toast.type === 'error'
            }"
            @mouseover="toast.timer.pause()"
            @mouseout="toast.timer.resume()"
        >
            <div class="flex items-center gap-2">
                <template x-if="toast.title">
                    <div>
                        <div class="font-semibold" x-text="toast.title"></div>
                        <div x-html="toast.message"></div>
                    </div>
                </template>
                <template x-if="! toast.title"><div x-html="toast.message"></div></template>
            </div>

            <button type="button" class="btn btn-ghost btn-sm btn-circle" @click="$store.toasts.destroyToast(toast.id)" aria-label="Close notification">
                <svg class="h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                    <path d="M12 10.586l4.95-4.95 1.414 1.414-4.95 4.95 4.95 4.95-1.414 1.414-4.95-4.95-4.95 4.95-1.414-1.414 4.95-4.95-4.95-4.95L7.05 5.636z"></path>
                </svg>
            </button>

            <div class="progressbar absolute bottom-0 left-0 h-[5px]" x-show="toast.duration > 0">
                <div class="inner" :style="`animation-duration:${toast.duration}s;animation-play-state:running`"></div>
            </div>
        </div>
    </template>
</div>

@if ($notify)
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            toast.notification(@js($notify['message']), @js($notify['type']), {
                title: @js($notify['title']),
            })
        })
    </script>
@endif
