<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
            {{ __('Add New Book') }}
        </h2>
    </x-slot>
    <section class="bg-white dark:bg-gray-900">
        <div class="mx-auto max-w-7xl py-8 sm:px-6 lg:px-8 lg:py-16">
            <h2 class="mb-4 text-xl font-bold text-gray-900 dark:text-white">Add New Book</h2>

            <form action="{{route('admin.bookmaster.store')}}" method="POST">
                @csrf
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
                            value=""
                            placeholder="Type book title"
                            required="true"
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
                            value=""
                            placeholder="Type book author"
                            required="true"
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
                            value=""
                            placeholder="1000"
                            required="true"
                        />
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
                        class="text-white bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800"
                    >
                        Add Book
                    </button>


                </div>
            </form>

        </div>

    </section>
</x-app-layout>
