<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            EDITAR CAJA - {{ $box->label }}
        </h2>
    </x-slot>
    <div class="w-full mx-auto p-4 sm:p-6 lg:p-8">
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white p-4 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        <form action="{{ route('boxes.update', $box->id) }}" method="POST" enctype="multipart/form-data"
                            class="flex flex-col items-start justify-center gap-3">
                            @csrf
                            @method('PUT')

                            <div class="flex justify-center items-center gap-4">
                                <label for="label">Etiqueta:</label>
                                <input type="text" name="label" id="label" placeholder="{{ $box->label }}">
                            </div>

                            <div class="flex gap-4 justify-center items-center">
                                <label for="location">Ubicación:</label>
                                <input type="text" name="location" id="label" placeholder="{{ $box->location }}">
                            </div>

                            <div>
                                <x-primary-button type="submit" class="mt-4">{{ __('Guardar cambios') }}
                                </x-primary-button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
