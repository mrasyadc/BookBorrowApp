<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
            {{ __('Borrow book') }}
        </h2>
    </x-slot>
    <section class="bg-white dark:bg-gray-900">
        <div class="mx-auto max-w-7xl py-8 sm:px-6 lg:px-8 lg:py-16">
            <form action="{{ route('user.borrow-transaction.store') }}" method="POST">
                @csrf
                <div class="mb-4 grid gap-4 sm:mb-5 sm:grid-cols-2 sm:gap-6">
                    <div class="sm:col-span-2">
                        <input type="hidden" name="bookId" value="{{ $book->id }}" />
                        <label for="title" class="mb-2 block text-sm font-medium text-gray-900 dark:text-white">
                            Book Title
                        </label>
                        <input
                            type="text"
                            name="title"
                            id="title"
                            class="focus:ring-primary-600 focus:border-primary-600 dark:focus:ring-primary-500 dark:focus:border-primary-500 block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder-gray-400"
                            value="{{ $book->title }}"
                            placeholder="{{ $book->title }}"
                            required="true"
                            disabled="true"
                        />
                    </div>
                    <div class="sm:col-span-2">
                        <label for="title" class="mb-2 block text-sm font-medium text-gray-900 dark:text-white">
                            Book Author
                        </label>
                        <input
                            type="text"
                            name="author"
                            id="author"
                            class="focus:ring-primary-600 focus:border-primary-600 dark:focus:ring-primary-500 dark:focus:border-primary-500 block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder-gray-400"
                            value="{{ $book->author }}"
                            placeholder="{{ $book->author }}"
                            required="true"
                            disabled="true"
                        />
                    </div>
                    <div class="w-full">
                        <label for="title" class="mb-2 block text-sm font-medium text-gray-900 dark:text-white">
                            Borrow Date (YYYY-MM-DD) and Return Date (YYYY-MM-DD)
                            <span class="text-red-500">*</span>
                            <span class="text-gray-500">(required)</span>
                        </label>

                        <div id="date-range-picker" date-rangepicker class="flex items-center">
                            <div class="relative">
                                <div class="pointer-events-none absolute inset-y-0 start-0 flex items-center ps-3">
                                    <svg
                                        class="h-4 w-4 text-gray-500 dark:text-gray-400"
                                        aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg"
                                        fill="currentColor"
                                        viewBox="0 0 20 20"
                                    >
                                        <path
                                            d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z"
                                        />
                                    </svg>
                                </div>
                                <input
                                    id="datepicker-range-start"
                                    name="start"
                                    type="text"
                                    class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 ps-10 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder-gray-400 dark:focus:border-blue-500 dark:focus:ring-blue-500"
                                    placeholder="Select date start"
                                />
                            </div>
                            <span class="mx-4 text-gray-500">to</span>
                            <div class="relative">
                                <div class="pointer-events-none absolute inset-y-0 start-0 flex items-center ps-3">
                                    <svg
                                        class="h-4 w-4 text-gray-500 dark:text-gray-400"
                                        aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg"
                                        fill="currentColor"
                                        viewBox="0 0 20 20"
                                    >
                                        <path
                                            d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z"
                                        />
                                    </svg>
                                </div>
                                <input
                                    id="datepicker-range-end"
                                    name="end"
                                    type="text"
                                    class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 ps-10 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder-gray-400 dark:focus:border-blue-500 dark:focus:ring-blue-500"
                                    placeholder="Select date end"
                                />
                            </div>
                        </div>
                    </div>
                </div>

                @if ($errors->any())
                    <div class="text-red">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <div
                                    class="mb-4 rounded-lg bg-red-50 p-4 text-sm text-red-800 dark:bg-gray-800 dark:text-red-400"
                                    role="alert"
                                >
                                    <span class="font-medium">Warning!</span>
                                    {{ $error }}
                                </div>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <div class="flex items-center space-x-4">
                    <button
                        type="submit"
                        class="bg-primary-700 hover:bg-primary-800 focus:ring-primary-300 dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800 rounded-lg px-5 py-2.5 text-center text-sm font-medium text-white focus:outline-none focus:ring-4"
                    >
                        Borrow book
                    </button>
                </div>
            </form>
        </div>
    </section>
</x-app-layout>
