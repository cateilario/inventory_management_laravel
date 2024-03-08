<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            EDITAR ITEM - {{ $item->name }}
        </h2>
    </x-slot>
    <div class="w-full mx-auto p-4 sm:p-6 lg:p-8">
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white p-4 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        <form action="{{ route('items.update', $item->id) }}" method="POST" enctype="multipart/form-data"
                            class="flex flex-col items-start justify-center gap-3">
                            @csrf
                            @method('PUT')
                            <div class="flex gap-4">
                                <label for="name">Nombre:</label>
                                <input type="text" name="name" placeholder="{{ $item->name }}" required>
                            </div>

                            <div class="flex gap-4">
                                <label for="description">Descripción:</label>
                                <textarea name="description" placeholder="{{ $item->description }}" required></textarea>
                            </div>

                            <div class="flex gap-4">
                                <label for="price">Precio:</label>
                                <input type="number" name="price" placeholder="{{ $item->price }}" required>
                            </div>
                            <div class="flex gap-4 justify-center items-center">
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
                            <div class="flex flex-col items-start justify-center">
                                <label for="picture">Imagen</label>
                                <input type="file" name="picture" id="picture">
                                @if ($item->picture != null)
                                    <img src="{{ asset(Storage::url($item->picture)) }}" alt="Portada Actual"
                                        class="w-[100px] h-[100px] mt-2">
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
