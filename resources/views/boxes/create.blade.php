<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            AÑADIR CAJA
        </h2>
    </x-slot>
    <div class="w-full mx-auto p-4 sm:p-6 lg:p-8">
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        <form action="{{ route('boxes.store') }}"
                            class="p-6 flex flex-col items-start justify-center gap-3" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="flex gap-4 items-center">
                                <label for="label">Etiqueta:</label>
                                <input type="text" name="label" id="label" required>
                            </div>

                            <div class="flex gap-4 items-center">
                                <label for="location">Ubicación:</label>
                                <input type="text" name="location" id="location">
                            </div>
                            <div>
                                <x-primary-button type="submit" class="mt-4">{{ __('Crear caja') }}
                                </x-primary-button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
