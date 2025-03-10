@props([
    'themeToggle' => 'multiple',
    'toggleThemes' => [
        'light',
        'dark',
    ],
    'themes' => []
])
@persist('theme-switcher')
@switch($themeToggle)
    @case ('multiple')
        <div title="Change Theme" class="dropdown dropdown-end z-[9999]">
            <div tabindex="0" class="btn btn-ghost gap-1 normal-case">
                <svg width="20" height="20" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                     class="inline-block h-5 w-5 stroke-current md:h-6 md:w-6">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M7 21a4 4 0 01-4-4V5a2 2 0 012-2h4a2 2 0 012 2v12a4 4 0 01-4 4zm0 0h12a2 2 0 002-2v-4a2 2 0 00-2-2h-2.343M11 7.343l1.657-1.657a2 2 0 012.828 0l2.829 2.829a2 2 0 010 2.828l-8.486 8.485M7 17h.01"></path>
                </svg>
                <svg width="12px" height="12px"
                     class="ml-1 hidden h-3 w-3 fill-current opacity-60 sm:inline-block"
                     xmlns="http://www.w3.org/2000/svg" viewBox="0 0 2048 2048">
                    <path d="M1799 349l242 241-1017 1017L7 590l242-241 775 775 775-775z"></path>
                </svg>
            </div>
            <div
                class="dropdown-content bg-base-200 text-base-content rounded-t-box rounded-b-box top-px mt-16 h-[70vh] max-h-96 w-52 overflow-y-auto shadow-2xl">
                <div class="grid grid-cols-1 gap-3 p-3" tabindex="0">
                    @foreach($themes as $theme)
                        <div class="outline-base-content overflow-hidden rounded-lg outline-2 outline-offset-2"
                             data-set-theme="{{ $theme }}" data-act-class="outline">
                            <div data-theme="{{ $theme }}"
                                 class="bg-base-100 text-base-content w-full cursor-pointer font-sans">
                                <div class="grid grid-cols-5 grid-rows-3">
                                    <div class="col-span-5 row-span-3 row-start-1 flex gap-1 py-3 px-4">
                                        <div class="flex-grow text-sm font-bold">{{ str($theme)->ucfirst() }}</div>
                                        <div class="flex flex-shrink-0 flex-wrap gap-1">
                                            <div class="bg-primary w-2 rounded"></div>
                                            <div class="bg-secondary w-2 rounded"></div>
                                            <div class="bg-accent w-2 rounded"></div>
                                            <div class="bg-neutral w-2 rounded"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        @break
    @case ('toggle')
        <label class="swap swap-rotate btn btn-ghost btn-circle" data-toggle-theme="{{ implode(',',$toggleThemes) }}"
               data-act-class="swap-active">
            <!-- sun icon -->
            <svg class="swap-off h-5 w-5 fill-current" xmlns="http://www.w3.org/2000/svg"
                 viewBox="0 0 24 24"
                 data-act-class="swap-active">
                <path
                    d="M5.64,17l-.71.71a1,1,0,0,0,0,1.41,1,1,0,0,0,1.41,0l.71-.71A1,1,0,0,0,5.64,17ZM5,12a1,1,0,0,0-1-1H3a1,1,0,0,0,0,2H4A1,1,0,0,0,5,12Zm7-7a1,1,0,0,0,1-1V3a1,1,0,0,0-2,0V4A1,1,0,0,0,12,5ZM5.64,7.05a1,1,0,0,0,.7.29,1,1,0,0,0,.71-.29,1,1,0,0,0,0-1.41l-.71-.71A1,1,0,0,0,4.93,6.34Zm12,.29a1,1,0,0,0,.7-.29l.71-.71a1,1,0,1,0-1.41-1.41L17,5.64a1,1,0,0,0,0,1.41A1,1,0,0,0,17.66,7.34ZM21,11H20a1,1,0,0,0,0,2h1a1,1,0,0,0,0-2Zm-9,8a1,1,0,0,0-1,1v1a1,1,0,0,0,2,0V20A1,1,0,0,0,12,19ZM18.36,17A1,1,0,0,0,17,18.36l.71.71a1,1,0,0,0,1.41,0,1,1,0,0,0,0-1.41ZM12,6.5A5.5,5.5,0,1,0,17.5,12,5.51,5.51,0,0,0,12,6.5Zm0,9A3.5,3.5,0,1,1,15.5,12,3.5,3.5,0,0,1,12,15.5Z"/>
            </svg>
            <!-- moon icon -->
            <svg class="swap-on h-5 w-5 fill-current" xmlns="http://www.w3.org/2000/svg"
                 viewBox="0 0 24 24"
                 data-act-class="swap-active">
                <path
                    d="M21.64,13a1,1,0,0,0-1.05-.14,8.05,8.05,0,0,1-3.37.73A8.15,8.15,0,0,1,9.08,5.49a8.59,8.59,0,0,1,.25-2A1,1,0,0,0,8,2.36,10.14,10.14,0,1,0,22,14.05,1,1,0,0,0,21.64,13Zm-9.5,6.69A8.14,8.14,0,0,1,7.08,5.22v.27A10.15,10.15,0,0,0,17.22,15.63a9.79,9.79,0,0,0,2.1-.22A8.11,8.11,0,0,1,12.14,19.73Z"/>
            </svg>

        </label>
        @break
    @default
@endswitch
@endpersist
