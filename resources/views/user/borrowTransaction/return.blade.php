{{-- @dd($unreturnedTransactions) --}}
<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
            {{ __('Return Books') }}
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
                                <th scope="col" class="px-6 py-3">Borrow Date</th>
                                <th scope="col" class="px-6 py-3">Total Due (Indonesian Rupiah)</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($unreturnedTransactions as $transaction)
                                <tr
                                    class="border-b bg-white hover:bg-gray-50 dark:border-gray-700 dark:bg-gray-800 dark:hover:bg-gray-600"
                                >
                                    <td class="w-4 p-4">
                                        {{ $transaction->id }}
                                    </td>
                                    <th
                                        scope="row"
                                        class="whitespace-nowrap px-6 py-4 font-medium text-gray-900 dark:text-white"
                                    >
                                        {{ $transaction->book->title }}
                                    </th>
                                    <td class="px-6 py-4">{{ $transaction->book->author }}</td>
                                    <td class="px-6 py-4">{{ $transaction->borrow_date }}</td>
                                    <td class="px-6 py-4">
                                        {{ Number::currency($transaction->total_cost, in: $currency) }}
                                    </td>

                                    <td class="flex items-center px-6 py-4">
                                        <form action="{{ route('user.return-transaction.post') }}" method="POST">
                                            @csrf
                                            <input type="hidden" name="transactionId" value="{{ $transaction->id }}" />
                                            <button
                                                type="submit"
                                                class="bg-primary-700 hover:bg-primary-800 focus:ring-primary-300 dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800 rounded-lg px-5 py-2.5 text-center text-sm font-medium text-white focus:outline-none focus:ring-4"
                                            >
                                                Return book
                                            </button>
                                        </form>
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
