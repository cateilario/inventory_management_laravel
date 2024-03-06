<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            CAJA {{ $box->label }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form action="{{ route('boxes.show', $box->id) }}" method="GET">
                        @csrf
                        @method('PUT')

                        <div class="mb-4">
                            <label for="label" class="block text-neutral-300 text-sm font-bold mb-2">Label:</label>
                            <p>{{ $box->label }}</p>
                        </div>

                        <div class="mb-4">
                            <label for="location"
                                class="block text-neutral-300 text-sm font-bold mb-2">Location:</label>
                            <p>{{ $box->location }}</p>
                        </div>

                        <div class="grid grid-cols-1 gap-2 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4">
                            @foreach ($box->items as $item)
                                <a href="{{ route('items.show', $item->id) }}"
                                    class="flex items-center px-2 py-4 bg-white dark:bg-gray-700 rounded-md shadow-sm border border-gray-300 dark:border-gray-600 hover:border-gray-400 dark:hover:border-gray-500 transition duration-100 ease-in-out">
                                    <div class="flex-shrink-0">
                                        @if ($item->picture)
                                            <img src="{{ asset(Storage::url($item->picture)) }}"
                                                alt="{{ $item->name }}" class="h-10 w-10 object-cover rounded-md">
                                        @else
                                            <div class="h-10 w-10 bg-gray-300 dark:bg-gray-600 rounded-md"></div>
                                        @endif
                                    </div>
                                    <div class="ml-4">
                                        <p class="text-sm font-medium text-gray-900 dark:text-gray-100">
                                            {{ $item->name }}</p>
                                        <p class="text-sm text-gray-500 dark:text-gray-400">
                                            @if (strlen($item->description) > 30)
                                                {{ substr($item->description, 0, 30) . '...' }}
                                            @else
                                                {{ $item->description }}
                                            @endif
                                        </p>
                                    </div>
                                </a>
                            @endforeach
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
