<x-app-layout>
    <x-slot name="header">
        {{-- @dd($book) --}}
        <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
            {{ __('Update Book') }}
        </h2>
    </x-slot>
    <section class="bg-white dark:bg-gray-900">
        <div class="mx-auto max-w-7xl py-8 sm:px-6 lg:px-8 lg:py-16">
            <h2 class="mb-4 text-xl font-bold text-gray-900 dark:text-white">Update Book</h2>
            <form action="#">
                <div class="mb-4 grid gap-4 sm:mb-5 sm:grid-cols-2 sm:gap-6">
                    <div class="sm:col-span-2">
                        <label for="title" class="mb-2 block text-sm font-medium text-gray-900 dark:text-white">
                            Book Title
                        </label>
                        <input
                            type="text"
                            name="title"
                            id="title"
                            class="focus:ring-primary-600 focus:border-primary-600 dark:focus:ring-primary-500 dark:focus:border-primary-500 block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder-gray-400"
                            value="{{ $book->title }}"
                            placeholder="Type book title"
                            required=""
                        />
                    </div>
                    <div class="w-full">
                        <label for="author" class="mb-2 block text-sm font-medium text-gray-900 dark:text-white">
                            Author
                        </label>
                        <input
                            type="text"
                            name="author"
                            id="author"
                            class="focus:ring-primary-600 focus:border-primary-600 dark:focus:ring-primary-500 dark:focus:border-primary-500 block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder-gray-400"
                            value="{{ $book->author }}"
                            placeholder="Type book author"
                            required=""
                        />
                    </div>
                    <div class="w-full">
                        <label for="price_per_day" class="mb-2 block text-sm font-medium text-gray-900 dark:text-white">
                            Price Per Day
                        </label>
                        <input
                            type="number"
                            name="price_per_day"
                            id="price_per_day"
                            class="focus:ring-primary-600 focus:border-primary-600 dark:focus:ring-primary-500 dark:focus:border-primary-500 block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder-gray-400"
                            value="{{ $book->price_per_day }}"
                            placeholder="1"
                            required=""
                        />
                    </div>

                <div class="flex items-center space-x-4">
                    <button
                        type="submit"
                        class="text-white bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800"
                    >
                        Update product
                    </button>
                    <button
                        type="button"
                        class="inline-flex items-center rounded-lg border border-red-600 px-5 py-2.5 text-center text-sm font-medium text-red-600 hover:bg-red-600 hover:text-white focus:outline-none focus:ring-4 focus:ring-red-300 dark:border-red-500 dark:text-red-500 dark:hover:bg-red-600 dark:hover:text-white dark:focus:ring-red-900"
                    >
                        <svg
                            class="-ml-1 mr-1 h-5 w-5"
                            fill="currentColor"
                            viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg"
                        >
                            <path
                                fill-rule="evenodd"
                                d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                                clip-rule="evenodd"
                            ></path>
                        </svg>
                        Delete
                    </button>
                </div>
            </form>
        </div>
    </section>
</x-app-layout>
