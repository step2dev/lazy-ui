@props([
'href' => '',
])

<div x-data="{ showModal: false }">
    <x-lazy-btn
        @click.prevent="showModal = true"
        x-bind:href="$props.href"
        outline danger sm :label="__('lazy.btn.delete')" sm class="mr-2">
    </x-lazy-btn>


    <div x-show="showModal" class="fixed z-10 inset-0 overflow-y-auto" style="display: none;">
        <div class="flex items-center justify-center min-h-screen px-4 pt-4 pb-20 text-center sm:block sm:p-0">
            <div x-show.transition.opacity="showModal" class="fixed inset-0 transition-opacity">
                <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
            </div>

            <span class="hidden sm:inline-block sm:align-middle sm:h-screen"></span>&#8203;

            <div x-show.transition.opacity="showModal"
                 class="inline-block align-bottom bg-white rounded-lg px-4 pt-5 pb-4 text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full"
                 role="dialog" aria-modal="true" aria-labelledby="modal-headline">
                <div class="hidden sm:block absolute top-0 right-0 pt-4 pr-4">
                    <button type="button" @click="showModal = false"
                            class="text-gray-400 hover:text-gray-500 focus:outline-none">
                        <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M6 18L18 6M6 6l12 12"></path>
                        </svg>
                    </button>
                </div>

                <div class="sm:flex sm:items-start">
                    <div
                        class="mx-auto flex-shrink-0 flex items-center justify-center h-12 w-12 rounded-full bg-red-100 sm:mx-0 sm:h-10 sm:w-10">
                        <svg class="h-6 w-6 text-red-600" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M6 18L18 6M6 6l12 12"></path>
                        </svg>
                    </div>

                    <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
                        <h3 class="text-lg leading-6 font-medium text-gray-900" id="modal-headline">Delete
                            Confirmation</h3>
                        <div class="mt-2">
                            <p class="text-sm leading-5 text-gray-500">Are you sure you want to delete this item?</p>
                        </div>
                    </div>
                </div>

                <div class="mt-5 sm:mt-4 sm:flex sm:flex-row-reverse">
                    <x-lazy-btn
                        @click.prevent="deleteItem"
                        x-bind:href="$props.href"
                        outline danger sm :label="__('lazy.btn.delete')" sm class="mr-2">
                    </x-lazy-btn>
                    {{--                    <button @click="deleteItem">Delete</button>--}}
                    {{--                    <form x-ref="form" method="POST" @submit.prevent="showModal = false; $refs.form.submit()">--}}
                    {{--                        @csrf--}}
                    {{--                        @method('DELETE')--}}
                    {{--                        <button type="submit"--}}
                    {{--                                class="inline-flex justify-center w-full px-4 py-2 text-sm font-medium text-red-600 bg-white border border-transparent rounded-md hover:bg-red-50 focus:outline-none focus:border-red-700 focus:shadow-outline-red active:bg-red-800 transition duration-150 ease-in-out">--}}
                    {{--                            Delete--}}
                    {{--                        </button>--}}
                    {{--                    </form>--}}

                    <button @click="showModal = false" type="button"
                            class="mt-3 w-full px-4 py-2 text-sm font-medium text-gray-700 bg-gray-200 border border-transparent rounded-md hover:bg-gray-300 focus:outline-none focus:border-gray-500 focus:shadow-outline-gray sm:mt-0 sm:w-auto sm:text-sm transition duration-150 ease-in-out">
                        Cancel
                    </button>
                </div>
            </div>
        </div>
    </div>
    <script>
        function deleteItem() {
            axios.delete('{{ $href }}')
                .then((response) => {
                    console.log(response);
                    // Действия после успешного удаления
                })
                .catch(() => {
                    // Действия в случае ошибки
                });
        }

    </script>
</div>
