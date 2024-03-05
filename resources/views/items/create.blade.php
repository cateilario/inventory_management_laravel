<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            AÑADIR ITEM
        </h2>
    </x-slot>
    <div class="max-w-2xl mx-auto p-4 sm:p-6 lg:p-8">
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        <form action="{{ route('items.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <div>
                                <label for="name">Nombre:</label>
                                <input type="text" name="name" id="name" required>
                            </div>

                            <div>
                                <label for="description">Descripción:</label>
                                <textarea name="description" id="description" required></textarea>
                            </div>

                            <div>
                                <label for="price">Precio:</label>
                                <input type="number" name="price" id="price" required>
                            </div>
                            <div>
                                <label for="box_id">Caja: </label>
                                <select name="box_id" id="box_id">
                                    @foreach ($boxes as $box)
                                        <option value="{{ $box->id }}">{{ $box->label }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div>
                                <label for="picture">Imagen:</label>
                                <input type="file" name="picture" id="picture">
                            </div>

                            <div>
                                <x-primary-button type="submit"
                                    class="mt-4">{{ __('Crear item') }}</x-primary-button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
