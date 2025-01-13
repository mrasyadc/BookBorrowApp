<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
            {{ __('Borrow Transacation Report') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="flex justify-end gap-4">
                <button
                    onclick="window.location='{{ route('admin.report.excel') }}'"
                    class="rounded-lg bg-green-700 px-5 py-2.5 text-center text-sm font-medium text-white hover:bg-green-800 focus:outline-none focus:ring-4 focus:ring-green-300 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800"
                >
                    Export to Excel
                </button>
                <button
                    onclick="window.location='{{ route('admin.report.excel') }}'"
                    class="rounded-lg bg-red-700 px-5 py-2.5 text-center text-sm font-medium text-white hover:bg-red-800 focus:outline-none focus:ring-4 focus:ring-red-300 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800"
                >
                    Export to PDF
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
                                <th scope="col" class="px-6 py-3">Borrower Name</th>
                                <th scope="col" class="px-6 py-3">Price per day</th>
                                <th scope="col" class="px-6 py-3">Borrow date</th>
                                <th scope="col" class="px-6 py-3">Total Days</th>
                                <th scope="col" class="px-6 py-3">Total Price</th>
                                <th scope="col" class="px-6 py-3">Is Returned</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($reports as $report)
                                <tr
                                    class="border-b bg-white hover:bg-gray-50 dark:border-gray-700 dark:bg-gray-800 dark:hover:bg-gray-600"
                                >
                                    <td class="w-4 p-4">
                                        {{ $report->transaction_id }}
                                    </td>
                                    <th
                                        scope="row"
                                        class="whitespace-nowrap px-6 py-4 font-medium text-gray-900 dark:text-white"
                                    >
                                        {{ $report->book_title }}
                                    </th>
                                    <td class="px-6 py-4">{{ $report->book_author }}</td>
                                    <td class="px-6 py-4">{{ $report->borrower_name }}</td>
                                    {{-- show price per day in IDR format --}}
                                    <td class="px-6 py-4">
                                        {{ Number::currency($report->price_per_day, in: $currency) }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ $report->borrow_date }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ $report->total_days }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ Number::currency($report->total_cost, in: $currency) }}
                                    </td>
                                    <td class="px-6 py-4">
                                        @if ($report->return_date)
                                            <div class="flex items-center">
                                                <div class="me-2 h-2.5 w-2.5 rounded-full bg-green-500"></div>
                                                Done
                                            </div>
                                        @else
                                            <div class="flex items-center">
                                                <div class="me-2 h-2.5 w-2.5 rounded-full bg-red-500"></div>
                                                No
                                            </div>
                                        @endif
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
