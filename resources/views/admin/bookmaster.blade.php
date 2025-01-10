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
                                    <div class="flex items-center">
                                        <input
                                            id="checkbox-all-search"
                                            type="checkbox"
                                            class="h-4 w-4 rounded border-gray-300 bg-gray-100 text-blue-600 focus:ring-2 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:ring-offset-gray-800 dark:focus:ring-blue-600 dark:focus:ring-offset-gray-800"
                                        />
                                        <label for="checkbox-all-search" class="sr-only">checkbox</label>
                                    </div>
                                </th>
                                <th scope="col" class="px-6 py-3">Product name</th>
                                <th scope="col" class="px-6 py-3">Color</th>
                                <th scope="col" class="px-6 py-3">Category</th>
                                <th scope="col" class="px-6 py-3">Accessories</th>
                                <th scope="col" class="px-6 py-3">Available</th>
                                <th scope="col" class="px-6 py-3">Price</th>
                                <th scope="col" class="px-6 py-3">Weight</th>
                                <th scope="col" class="px-6 py-3">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr
                                class="border-b bg-white hover:bg-gray-50 dark:border-gray-700 dark:bg-gray-800 dark:hover:bg-gray-600"
                            >
                                <td class="w-4 p-4">
                                    <div class="flex items-center">
                                        <input
                                            id="checkbox-table-search-1"
                                            type="checkbox"
                                            class="h-4 w-4 rounded border-gray-300 bg-gray-100 text-blue-600 focus:ring-2 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:ring-offset-gray-800 dark:focus:ring-blue-600 dark:focus:ring-offset-gray-800"
                                        />
                                        <label for="checkbox-table-search-1" class="sr-only">checkbox</label>
                                    </div>
                                </td>
                                <th
                                    scope="row"
                                    class="whitespace-nowrap px-6 py-4 font-medium text-gray-900 dark:text-white"
                                >
                                    Apple MacBook Pro 17"
                                </th>
                                <td class="px-6 py-4">Silver</td>
                                <td class="px-6 py-4">Laptop</td>
                                <td class="px-6 py-4">Yes</td>
                                <td class="px-6 py-4">Yes</td>
                                <td class="px-6 py-4">$2999</td>
                                <td class="px-6 py-4">3.0 lb.</td>
                                <td class="flex items-center px-6 py-4">
                                    <a href="#" class="font-medium text-blue-600 hover:underline dark:text-blue-500">
                                        Edit
                                    </a>
                                    <a href="#" class="ms-3 font-medium text-red-600 hover:underline dark:text-red-500">
                                        Remove
                                    </a>
                                </td>
                            </tr>
                            <tr
                                class="border-b bg-white hover:bg-gray-50 dark:border-gray-700 dark:bg-gray-800 dark:hover:bg-gray-600"
                            >
                                <td class="w-4 p-4">
                                    <div class="flex items-center">
                                        <input
                                            id="checkbox-table-search-2"
                                            type="checkbox"
                                            class="h-4 w-4 rounded border-gray-300 bg-gray-100 text-blue-600 focus:ring-2 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:ring-offset-gray-800 dark:focus:ring-blue-600 dark:focus:ring-offset-gray-800"
                                        />
                                        <label for="checkbox-table-search-2" class="sr-only">checkbox</label>
                                    </div>
                                </td>
                                <th
                                    scope="row"
                                    class="whitespace-nowrap px-6 py-4 font-medium text-gray-900 dark:text-white"
                                >
                                    Microsoft Surface Pro
                                </th>
                                <td class="px-6 py-4">White</td>
                                <td class="px-6 py-4">Laptop PC</td>
                                <td class="px-6 py-4">No</td>
                                <td class="px-6 py-4">Yes</td>
                                <td class="px-6 py-4">$1999</td>
                                <td class="px-6 py-4">1.0 lb.</td>
                                <td class="flex items-center px-6 py-4">
                                    <a href="#" class="font-medium text-blue-600 hover:underline dark:text-blue-500">
                                        Edit
                                    </a>
                                    <a href="#" class="ms-3 font-medium text-red-600 hover:underline dark:text-red-500">
                                        Remove
                                    </a>
                                </td>
                            </tr>
                            <tr
                                class="border-b bg-white hover:bg-gray-50 dark:border-gray-700 dark:bg-gray-800 dark:hover:bg-gray-600"
                            >
                                <td class="w-4 p-4">
                                    <div class="flex items-center">
                                        <input
                                            id="checkbox-table-search-3"
                                            type="checkbox"
                                            class="h-4 w-4 rounded border-gray-300 bg-gray-100 text-blue-600 focus:ring-2 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:ring-offset-gray-800 dark:focus:ring-blue-600 dark:focus:ring-offset-gray-800"
                                        />
                                        <label for="checkbox-table-search-3" class="sr-only">checkbox</label>
                                    </div>
                                </td>
                                <th
                                    scope="row"
                                    class="whitespace-nowrap px-6 py-4 font-medium text-gray-900 dark:text-white"
                                >
                                    Magic Mouse 2
                                </th>
                                <td class="px-6 py-4">Black</td>
                                <td class="px-6 py-4">Accessories</td>
                                <td class="px-6 py-4">Yes</td>
                                <td class="px-6 py-4">No</td>
                                <td class="px-6 py-4">$99</td>
                                <td class="px-6 py-4">0.2 lb.</td>
                                <td class="flex items-center px-6 py-4">
                                    <a href="#" class="font-medium text-blue-600 hover:underline dark:text-blue-500">
                                        Edit
                                    </a>
                                    <a href="#" class="ms-3 font-medium text-red-600 hover:underline dark:text-red-500">
                                        Remove
                                    </a>
                                </td>
                            </tr>
                            <tr
                                class="border-b bg-white hover:bg-gray-50 dark:border-gray-700 dark:bg-gray-800 dark:hover:bg-gray-600"
                            >
                                <td class="w-4 p-4">
                                    <div class="flex items-center">
                                        <input
                                            id="checkbox-table-search-3"
                                            type="checkbox"
                                            class="h-4 w-4 rounded border-gray-300 bg-gray-100 text-blue-600 focus:ring-2 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:ring-offset-gray-800 dark:focus:ring-blue-600 dark:focus:ring-offset-gray-800"
                                        />
                                        <label for="checkbox-table-search-3" class="sr-only">checkbox</label>
                                    </div>
                                </td>
                                <th
                                    scope="row"
                                    class="whitespace-nowrap px-6 py-4 font-medium text-gray-900 dark:text-white"
                                >
                                    Apple Watch
                                </th>
                                <td class="px-6 py-4">Black</td>
                                <td class="px-6 py-4">Watches</td>
                                <td class="px-6 py-4">Yes</td>
                                <td class="px-6 py-4">No</td>
                                <td class="px-6 py-4">$199</td>
                                <td class="px-6 py-4">0.12 lb.</td>
                                <td class="flex items-center px-6 py-4">
                                    <a href="#" class="font-medium text-blue-600 hover:underline dark:text-blue-500">
                                        Edit
                                    </a>
                                    <a href="#" class="ms-3 font-medium text-red-600 hover:underline dark:text-red-500">
                                        Remove
                                    </a>
                                </td>
                            </tr>
                            <tr
                                class="border-b bg-white hover:bg-gray-50 dark:border-gray-700 dark:bg-gray-800 dark:hover:bg-gray-600"
                            >
                                <td class="w-4 p-4">
                                    <div class="flex items-center">
                                        <input
                                            id="checkbox-table-search-3"
                                            type="checkbox"
                                            class="h-4 w-4 rounded border-gray-300 bg-gray-100 text-blue-600 focus:ring-2 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:ring-offset-gray-800 dark:focus:ring-blue-600 dark:focus:ring-offset-gray-800"
                                        />
                                        <label for="checkbox-table-search-3" class="sr-only">checkbox</label>
                                    </div>
                                </td>
                                <th
                                    scope="row"
                                    class="whitespace-nowrap px-6 py-4 font-medium text-gray-900 dark:text-white"
                                >
                                    Apple iMac
                                </th>
                                <td class="px-6 py-4">Silver</td>
                                <td class="px-6 py-4">PC</td>
                                <td class="px-6 py-4">Yes</td>
                                <td class="px-6 py-4">Yes</td>
                                <td class="px-6 py-4">$2999</td>
                                <td class="px-6 py-4">7.0 lb.</td>
                                <td class="flex items-center px-6 py-4">
                                    <a href="#" class="font-medium text-blue-600 hover:underline dark:text-blue-500">
                                        Edit
                                    </a>
                                    <a href="#" class="ms-3 font-medium text-red-600 hover:underline dark:text-red-500">
                                        Remove
                                    </a>
                                </td>
                            </tr>
                            <tr
                                class="border-b bg-white hover:bg-gray-50 dark:border-gray-700 dark:bg-gray-800 dark:hover:bg-gray-600"
                            >
                                <td class="w-4 p-4">
                                    <div class="flex items-center">
                                        <input
                                            id="checkbox-table-search-3"
                                            type="checkbox"
                                            class="h-4 w-4 rounded border-gray-300 bg-gray-100 text-blue-600 focus:ring-2 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:ring-offset-gray-800 dark:focus:ring-blue-600 dark:focus:ring-offset-gray-800"
                                        />
                                        <label for="checkbox-table-search-3" class="sr-only">checkbox</label>
                                    </div>
                                </td>
                                <th
                                    scope="row"
                                    class="whitespace-nowrap px-6 py-4 font-medium text-gray-900 dark:text-white"
                                >
                                    Apple AirPods
                                </th>
                                <td class="px-6 py-4">White</td>
                                <td class="px-6 py-4">Accessories</td>
                                <td class="px-6 py-4">No</td>
                                <td class="px-6 py-4">Yes</td>
                                <td class="px-6 py-4">$399</td>
                                <td class="px-6 py-4">38 g</td>
                                <td class="flex items-center px-6 py-4">
                                    <a href="#" class="font-medium text-blue-600 hover:underline dark:text-blue-500">
                                        Edit
                                    </a>
                                    <a href="#" class="ms-3 font-medium text-red-600 hover:underline dark:text-red-500">
                                        Remove
                                    </a>
                                </td>
                            </tr>
                            <tr
                                class="border-b bg-white hover:bg-gray-50 dark:border-gray-700 dark:bg-gray-800 dark:hover:bg-gray-600"
                            >
                                <td class="w-4 p-4">
                                    <div class="flex items-center">
                                        <input
                                            id="checkbox-table-search-3"
                                            type="checkbox"
                                            class="h-4 w-4 rounded border-gray-300 bg-gray-100 text-blue-600 focus:ring-2 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:ring-offset-gray-800 dark:focus:ring-blue-600 dark:focus:ring-offset-gray-800"
                                        />
                                        <label for="checkbox-table-search-3" class="sr-only">checkbox</label>
                                    </div>
                                </td>
                                <th
                                    scope="row"
                                    class="whitespace-nowrap px-6 py-4 font-medium text-gray-900 dark:text-white"
                                >
                                    iPad Pro
                                </th>
                                <td class="px-6 py-4">Gold</td>
                                <td class="px-6 py-4">Tablet</td>
                                <td class="px-6 py-4">No</td>
                                <td class="px-6 py-4">Yes</td>
                                <td class="px-6 py-4">$699</td>
                                <td class="px-6 py-4">1.3 lb.</td>
                                <td class="flex items-center px-6 py-4">
                                    <a href="#" class="font-medium text-blue-600 hover:underline dark:text-blue-500">
                                        Edit
                                    </a>
                                    <a href="#" class="ms-3 font-medium text-red-600 hover:underline dark:text-red-500">
                                        Remove
                                    </a>
                                </td>
                            </tr>
                            <tr
                                class="border-b bg-white hover:bg-gray-50 dark:border-gray-700 dark:bg-gray-800 dark:hover:bg-gray-600"
                            >
                                <td class="w-4 p-4">
                                    <div class="flex items-center">
                                        <input
                                            id="checkbox-table-search-3"
                                            type="checkbox"
                                            class="h-4 w-4 rounded border-gray-300 bg-gray-100 text-blue-600 focus:ring-2 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:ring-offset-gray-800 dark:focus:ring-blue-600 dark:focus:ring-offset-gray-800"
                                        />
                                        <label for="checkbox-table-search-3" class="sr-only">checkbox</label>
                                    </div>
                                </td>
                                <th
                                    scope="row"
                                    class="whitespace-nowrap px-6 py-4 font-medium text-gray-900 dark:text-white"
                                >
                                    Magic Keyboard
                                </th>
                                <td class="px-6 py-4">Black</td>
                                <td class="px-6 py-4">Accessories</td>
                                <td class="px-6 py-4">Yes</td>
                                <td class="px-6 py-4">Yes</td>
                                <td class="px-6 py-4">$99</td>
                                <td class="px-6 py-4">453 g</td>
                                <td class="flex items-center px-6 py-4">
                                    <a href="#" class="font-medium text-blue-600 hover:underline dark:text-blue-500">
                                        Edit
                                    </a>
                                    <a href="#" class="ms-3 font-medium text-red-600 hover:underline dark:text-red-500">
                                        Remove
                                    </a>
                                </td>
                            </tr>
                            <tr
                                class="border-b bg-white hover:bg-gray-50 dark:border-gray-700 dark:bg-gray-800 dark:hover:bg-gray-600"
                            >
                                <td class="w-4 p-4">
                                    <div class="flex items-center">
                                        <input
                                            id="checkbox-table-search-3"
                                            type="checkbox"
                                            class="h-4 w-4 rounded border-gray-300 bg-gray-100 text-blue-600 focus:ring-2 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:ring-offset-gray-800 dark:focus:ring-blue-600 dark:focus:ring-offset-gray-800"
                                        />
                                        <label for="checkbox-table-search-3" class="sr-only">checkbox</label>
                                    </div>
                                </td>
                                <th
                                    scope="row"
                                    class="whitespace-nowrap px-6 py-4 font-medium text-gray-900 dark:text-white"
                                >
                                    Apple TV 4K
                                </th>
                                <td class="px-6 py-4">Black</td>
                                <td class="px-6 py-4">TV</td>
                                <td class="px-6 py-4">Yes</td>
                                <td class="px-6 py-4">No</td>
                                <td class="px-6 py-4">$179</td>
                                <td class="px-6 py-4">1.78 lb.</td>
                                <td class="flex items-center px-6 py-4">
                                    <a href="#" class="font-medium text-blue-600 hover:underline dark:text-blue-500">
                                        Edit
                                    </a>
                                    <a href="#" class="ms-3 font-medium text-red-600 hover:underline dark:text-red-500">
                                        Remove
                                    </a>
                                </td>
                            </tr>
                            <tr
                                class="border-b bg-white hover:bg-gray-50 dark:border-gray-700 dark:bg-gray-800 dark:hover:bg-gray-600"
                            >
                                <td class="w-4 p-4">
                                    <div class="flex items-center">
                                        <input
                                            id="checkbox-table-search-3"
                                            type="checkbox"
                                            class="h-4 w-4 rounded border-gray-300 bg-gray-100 text-blue-600 focus:ring-2 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:ring-offset-gray-800 dark:focus:ring-blue-600 dark:focus:ring-offset-gray-800"
                                        />
                                        <label for="checkbox-table-search-3" class="sr-only">checkbox</label>
                                    </div>
                                </td>
                                <th
                                    scope="row"
                                    class="whitespace-nowrap px-6 py-4 font-medium text-gray-900 dark:text-white"
                                >
                                    AirTag
                                </th>
                                <td class="px-6 py-4">Silver</td>
                                <td class="px-6 py-4">Accessories</td>
                                <td class="px-6 py-4">Yes</td>
                                <td class="px-6 py-4">No</td>
                                <td class="px-6 py-4">$29</td>
                                <td class="px-6 py-4">53 g</td>
                                <td class="flex items-center px-6 py-4">
                                    <a href="#" class="font-medium text-blue-600 hover:underline dark:text-blue-500">
                                        Edit
                                    </a>
                                    <a href="#" class="ms-3 font-medium text-red-600 hover:underline dark:text-red-500">
                                        Remove
                                    </a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
