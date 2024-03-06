<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            EDITAR CAJA - {{ $box->label }}
        </h2>
    </x-slot>
    <div class="max-w-2xl mx-auto p-4 sm:p-6 lg:p-8">
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        <form action="{{ route('boxes.update', $item->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div>
                                <label for="label">Nombre:</label>
                                <input type="text" name="label" id="label" placeholder="{{ $box->label }}">
                            </div>

                            <div>
                                <label for="location">Descripción:</label>
                                <input type="text" name="location" id="location" placeholder="{{ $box->location }}">
                            </div>

                            <div class="mb-4">
                                <label for="items"
                                    class="block text-neutral-300 text-sm font-bold mb-2">Items:</label>
                                <div class="flex gap-4">
                                    <ul id="assignedItems"
                                        class="py-3 overflow-auto bg-gray-600 rounded-md border border-gray-300 dark:border-gray-600 shadow-sm px-3 w-1/2">
                                        @foreach ($box->items as $item)
                                            <li class="assigned-item item-row cursor-pointer px-3 py-1 hover:bg-red-400 mb-1 last:mb-0 rounded-md"
                                                data-id="{{ $item->id }}" data-box_id="{{ $item->box_id }}">
                                                {{ $item->name }}</li>
                                        @endforeach
                                    </ul>

                                    <ul id="unassignedItems"
                                        class="py-3 overflow-auto bg-gray-600 rounded-md border border-gray-300 dark:border-gray-600 shadow-sm px-3 w-1/2">
                                        @foreach ($unassignedItems as $item)
                                            <li class="unassigned-item item-row cursor-pointer px-3 py-1 hover:bg-green-500  mb-1 last:mb-0 rounded-md"
                                                data-id="{{ $item->id }}">{{ $item->name }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>

                            <div>
                                <x-primary-button class="mt-4">{{ __('Guardar cambios') }}</x-primary-button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
