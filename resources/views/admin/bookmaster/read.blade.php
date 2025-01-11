<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
            {{ __('Book Master Data') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg dark:bg-gray-800">
                <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                    <table class="w-full text-left text-sm text-gray-500 rtl:text-right dark:text-gray-400">
                        <thead class="bg-gray-50 text-xs uppercase text-gray-700 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="p-4">
                                    <div class="flex items-center">id</div>
                                </th>
                                <th scope="col" class="px-6 py-3">Book Name</th>
                                <th scope="col" class="px-6 py-3">Author</th>
                                <th scope="col" class="px-6 py-3">Price</th>
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
                                    <td class="px-6 py-4">{{ $book->price_per_day }}</td>
                                    <td class="flex items-center px-6 py-4">
                                        <a
                                            href="#"
                                            class="font-medium text-blue-600 hover:underline dark:text-blue-500"
                                        >
                                            Edit
                                        </a>
                                        <a
                                            href="#"
                                            class="ms-3 font-medium text-red-600 hover:underline dark:text-red-500"
                                        >
                                            Remove
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
