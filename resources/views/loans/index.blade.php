<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Préstamos') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <table data-auth-user-id="{{ Auth::id() }}">
                        <thead>
                            <tr>
                                <th>Usuario</th>
                                <th>Item</th>
                                <th>Fecha de préstamo</th>
                                <th>Fecha de devolución</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($loans as $loan)
                                <tr class="loan-row cursor-pointer hover:bg-gray-750" data-id="{{ $loan->id }}"
                                    data-user-id="{{ $loan->user_id }}">
                                    <td class="px-6 py-4">
                                        <div class="text-center text-sm font-medium text-gray-900 dark:text-gray-200">
                                            {{ $users->find($loan->user_id)->name }}
                                        </div>
                                    </td>
                                    <td class="px-6 py-4">
                                        <div class="text-center text-sm font-medium text-gray-900 dark:text-gray-200">
                                            {{ $items->find($loan->item_id)->name }}
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-center text-sm font-medium text-gray-900 dark:text-gray-200">
                                            {{ $loan->checkout_date }}
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-center text-sm font-medium text-gray-900 dark:text-gray-200">
                                            {{ $loan->due_date }}
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-center text-sm font-medium text-gray-900 dark:text-gray-200">
                                            @if ($loan->returned_date === null)
                                                @if ($loan->user_id === Auth::id())
                                                    <form action="{{ route('loans.update', $loan->id) }}"
                                                        method="POST">
                                                        @csrf
                                                        @method('PUT')
                                                        <button type="submit"
                                                            class="text-blue-600 dark:text-blue-400 hover:underline focus:outline-none">
                                                            Mark as returned
                                                        </button>
                                                    </form>
                                                @else
                                                    <span class="text-red-600 dark:text-red-400">Not returned</span>
                                                @endif
                                            @else
                                                {{ $loan->returned_date }}
                                            @endif
                                        </div>
                                    </td>
                                </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
