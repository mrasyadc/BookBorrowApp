<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
            {{ __('Book Master Data') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="flex justify-end">
                <button
                    onclick="window.location='{{ route('admin.bookmaster.create') }}'"
                    class="bg-primary-700 hover:bg-primary-800 focus:ring-primary-300 dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800 rounded-lg px-5 py-2.5 text-center text-sm font-medium text-white focus:outline-none focus:ring-4"
                >
                    Add new book
                </button>
            </div>
            <div class="mt-4 overflow-hidden bg-white shadow-sm sm:rounded-lg dark:bg-gray-800">
                <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                    <table class="w-full text-left text-sm text-gray-500 rtl:text-right dark:text-gray-400">
                        <thead class="bg-gray-50 text-xs uppercase text-gray-700 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="p-4">
                                    <div class="flex items-center">id</div>
                                </th>
                                <th scope="col" class="px-6 py-3">Book Name</th>
                                <th scope="col" class="px-6 py-3">Author</th>
                                <th scope="col" class="px-6 py-3">Price (Indonesian Rupiah)</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($books as $book)
                                <tr
                                    class="border-b bg-white hover:bg-gray-50 dark:border-gray-700 dark:bg-gray-800 dark:hover:bg-gray-600"
                                >
                                    <td class="w-4 p-4">
                                        {{ $book->id }}
                                    </td>
                                    <th
                                        scope="row"
                                        class="whitespace-nowrap px-6 py-4 font-medium text-gray-900 dark:text-white"
                                    >
                                        {{ $book->title }}
                                    </th>
                                    <td class="px-6 py-4">{{ $book->author }}</td>
                                    {{-- show price per day in IDR format --}}
                                    <td class="px-6 py-4">
                                        {{ Number::currency($book->price_per_day, in: $currency) }}
                                    </td>
                                    <td class="flex items-center px-6 py-4">
                                        <a
                                            href="{{ route('admin.bookmaster.edit', $book->id) }}"
                                            class="font-medium text-blue-600 hover:underline dark:text-blue-500"
                                        >
                                            Edit
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
