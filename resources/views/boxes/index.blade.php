<x-app-layout>
    <div class="max-w-2xl mx-auto p-4 sm:p-6 lg:p-8">
        <form action="{{ route('boxes.create') }}">
            <x-primary-button class="mt-4">{{ __('Añadir Caja') }}</x-primary-button>
        </form>

        <div class="mt-6 bg-white shadow-sm rounded-lg divide-y">
            <div class="p-6 text-gray-900 dark:text-gray-100">
                <table class="min-w-full w-full" id="items-table">
                    <thead>
                        <tr>
                            <th
                                class="px-6 py-3 border-b-2 border-gray-300 dark:border-gray-700 text-center text-xs font-semibold text-gray-600 dark:text-gray-400 uppercase tracking-wider whitespace-nowraps">
                                Etiqueta
                            </th>
                            <th
                                class="px-6 py-3 border-b-2 border-gray-300 dark:border-gray-700 text-center text-xs font-semibold text-gray-600 dark:text-gray-400 uppercase tracking-wider whitespace-nowraps">
                                Ubicación
                            </th>
                            <th
                                class="px-6 py-3 border-b-2 border-gray-300 dark:border-gray-700 text-center text-xs font-semibold text-gray-600 dark:text-gray-400 uppercase tracking-wider whitespace-nowraps">
                                Items
                            </th>
                            <th
                                class="px-6 py-3 border-b-2 border-gray-300 dark:border-gray-700 text-center text-xs font-semibold text-gray-600 dark:text-gray-400 uppercase tracking-wider whitespace-nowraps">
                                Acciones
                            </th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($boxes as $box)
                            <tr class="box-row cursor-pointer hover:bg-gray-750" data-id="{{ $box->id }}">
                                <td class="px-6 py-4">
                                    <div class="text-center text-sm font-medium text-gray-900 dark:text-gray-200">
                                        {{ $box->label }}
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="text-center text-sm text-gray-900 dark:text-gray-200">
                                        {{ $box->location }}</div>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="text-center text-sm text-gray-900 dark:text-gray-200">
                                        {{ $box->items->count() }}</div>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="flex justify-center space-x-2">
                                        <a href="{{ route('boxes.edit', $box->id) }}"
                                            class="text-indigo-600 dark:text-indigo-400 hover:text-indigo-500 dark:hover:text-indigo-300 focus:outline-none focus:underline">Edit</a>
                                        <form action="{{ route('boxes.destroy', $box->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                class="text-red-600 dark:text-red-400 hover:text-red-500 dark:hover:text-red-300 focus:outline-none focus:underline">Delete</button>
                                        </form>
                                    </div>
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
