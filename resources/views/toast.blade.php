<div x-data class="fixed top-0 right-0 flex-wrap overflow-x-hidden p-4 z-[1000]" id="toasts">
    <template
        x-for="(toast, index) in $store.toasts.list"
        :key="toast.id"
    >
        <div
            x-show="toast.visible"
            x-transition:enter="transition ease-in duration-200"
            x-transition:enter-start="transform opacity-0 translate-y-2"
            x-transition:enter-end="transform opacity-100"
            x-transition:leave="transition ease-out duration-500"
            x-transition:leave-start="transform translate-x-0 opacity-100"
            x-transition:leave-end="transform translate-x-full opacity-0"
            class="relative mb-3 flex flex-col overflow-hidden rounded bg-gray-900 bg-gradient-to-r p-3 pr-10 text-white shadow-lg"
            @mouseover="toast.timer.pause()"
            @mouseout="toast.timer.resume()"
            :class="{
                'from-blue-500 to-blue-600': toast.type === 'info',
                'from-green-500 to-green-600': toast.type === 'success',
                'from-yellow-400 to-yellow-500': toast.type === 'warning',
                'from-red-500 to-pink-500': toast.type === 'error'
            }"
        >
            <div class="absolute right-2 top-2 z-[1000] cursor-pointer"
                 @click="$store.toasts.destroyToast(toast.id)"
            >
                <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                    <g>
                        <path fill="none" d="M0 0h24v24H0z"></path>
                        <path
                            d="M12 10.586l4.95-4.95 1.414 1.414-4.95 4.95 4.95 4.95-1.414 1.414-4.95-4.95-4.95 4.95-1.414-1.414 4.95-4.95-4.95-4.95L7.05 5.636z"></path>
                    </g>
                </svg>
            </div>
            <div class="w-100 flex flex-row items-center">
                <svg
                    x-show="toast.type === 'info'"
                    class="mr-2 h-6 w-6"
                    xmlns="http://www.w3.org/2000/svg"
                    viewBox="0 0 20 20"
                    fill="currentColor"
                >
                    <path
                        fill-rule="evenodd"
                        d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"
                        clip-rule="evenodd"
                    />
                </svg>
                <svg
                    x-show="toast.type === 'success'"
                    class="mr-2 h-6 w-6"
                    xmlns="http://www.w3.org/2000/svg"
                    viewBox="0 0 20 20"
                    fill="currentColor"
                >
                    <path
                        fill-rule="evenodd"
                        d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                        clip-rule="evenodd"
                    />
                </svg>
                <svg
                    x-show="toast.type === 'warning'"
                    class="mr-2 h-6 w-6"
                    xmlns="http://www.w3.org/2000/svg"
                    viewBox="0 0 20 20"
                    fill="currentColor"
                >
                    <path
                        fill-rule="evenodd"
                        d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z"
                        clip-rule="evenodd"
                    />
                </svg>
                <svg
                    x-show="toast.type === 'error'"
                    class="mr-2 h-6 w-6"
                    xmlns="http://www.w3.org/2000/svg"
                    viewBox="0 0 20 20"
                    fill="currentColor"
                >
                    <path
                        fill-rule="evenodd"
                        d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z"
                        clip-rule="evenodd"
                    />
                </svg>
                <template x-if="toast.title">
                    <div>
                        <div x-text="toast.title"></div>
                        <div x-html="toast.message"></div>
                    </div>
                </template>
                <template x-if="! toast.title">
                    <div x-html="toast.message"></div>
                </template>

            </div>
            <div class="progressbar w-100 absolute left-0 bottom-0 h-[5px]" x-show="toast.duration > 0">
                <div class="inner" :style="`animation-duration:${toast.duration}s;animation-play-state:running`"
                     style=""></div>
            </div>
        </div>
    </template>
    <style>
        .progressbar {
            width: 100%;
        }

        .progressbar .inner {
            height: 15px;
            animation: progressbar-countdown;
            /* Placeholder, this will be updated using javascript */
            animation-duration: 40s;
            /* We stop in the end */
            animation-iteration-count: 1;
            /* Stay on pause when the animation is finished finished */
            animation-fill-mode: forwards;
            /* We start paused, we start the animation using javascript */
            animation-play-state: paused;
            /* We want a linear animation, ease-out is standard */
            animation-timing-function: linear;
        }

        #toasts > div:hover .inner {
            animation-play-state: paused !important;
        }

        @keyframes progressbar-countdown {
            0% {
                width: 100%;
                background: #0F0;
            }
            100% {
                width: 0;
                background: #F00;
            }
        }
    </style>
</div>

@if (session()->has('notify-flash'))
    @php
        $notify = session('notify-flash')
    @endphp
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            toast.notification('{{ $notify['message'] }}', '{{ $notify['type'] }}', {
                title: '{{ $notify['title'] }}',
            })
        })
    </script>
@endif
