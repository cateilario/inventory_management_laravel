<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            EDITAR ITEM - {{ $item->name }}
        </h2>
    </x-slot>
    <div class="max-w-2xl mx-auto p-4 sm:p-6 lg:p-8">
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        <form action="{{ route('items.update', $item->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div>
                                <label for="name">Nombre:</label>
                                <input type="text" name="name" placeholder="{{ $item->name }}" required>
                            </div>

                            <div>
                                <label for="description">Descripción:</label>
                                <textarea name="description" placeholder="{{ $item->description }}" required></textarea>
                            </div>

                            <div>
                                <label for="price">Precio:</label>
                                <input type="number" name="price" placeholder="{{ $item->price }}" required>
                            </div>
                            <div>
                                <label for="box_id">Caja: </label>
                                <select name="box_id" id="box_id">
                                    @foreach ($boxes as $box)
                                        @if ($item->box_id == $box->id)
                                            <option value="{{ $box->id }}" selected>{{ $box->label }}</option>
                                        @else
                                            <option value="{{ $box->id }}">{{ $box->label }}</option>
                                        @endif
                                    @endforeach
                            </div>

                            <div>
                                <label for="picture">Imagen:</label>
                                <input type="file" name="picture" id="picture">
                                @if ($item->picture != null)
                                    <img src="{{ asset(Storage::url($item->picture)) }}" alt="Portada Actual"
                                        class="w-[100px] h-[100px] mt-2">
                                    <div
                                        class="flex items-center justify-center h-20 w-20 bg-gray-300 dark:bg-gray-600 rounded-md text-gray-400 dark:text-gray-500 text-xs">
                                        No picture
                                    </div>
                                @endif
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
