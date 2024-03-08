<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            CAJA {{ $box->label }}
        </h2>
    </x-slot>
    <div class="w-full mx-auto p-4 sm:p-6 lg:p-8">
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white p-4 shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        <form action="{{ route('boxes.show', $box->id) }}" method="GET">
                            @csrf
                            @method('PUT')
                            <table class="w-full">
                                <tr>
                                    <td class="text-gray-950 p-3">Etiquta: </td>
                                    <td class="p-3">{{ $box->label }}</td>
                                </tr>
                                <tr>
                                    <td class="text-gray-950 p-3">Ubicación: </td>
                                    <td>{{ $box->location }}</td>
                                </tr>
                                <tr>
                                    <td>Contenido:</td>
                                </tr>
                                <tr>
                                    <th class="p-4">Nombre</th>
                                    <th class="p-4">Caja</th>
                                    <th class="p-4">Acciones</th>
                                </tr>
                                @foreach ($box->items as $item)
                                    <tr>
                                        <td class="w-1/3">{{ $item->name }}</td>
                                        <td class="w-1/3">{{ $box->label }}</td>
                                        <td class="w-1/2">
                                            <!-- Acciones para el item -->
                                            <div
                                                class="w-full text-sm text-gray-900 dark:text-gray-100 flex justify-around items-center gap-5">
                                                <a href="{{ route('items.edit', $item->id) }}" title="Editar Item"
                                                    class=" text-center rounded-lg p-3 bg-gray-900">Editar</a>
                                                <a href="{{ route('items.show', $item->id) }}" title="Editar Item"
                                                    class=" text-center rounded-lg p-3 bg-gray-900">Ver
                                                    Item</a>
                                                <form action="{{ route('items.destroy', $item->id) }}" method="post">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button title="Eliminar Item" id="delete-btn"
                                                        class="bg-red-800 text-center rounded-lg p-3"
                                                        type="submit">Eliminar</button>
                                                </form>
                                                @if ($item->activeLoan())
                                                    <a href="{{ route('loans.show', $item->activeLoan()->id) }}"
                                                        title="Ver Prestamo"
                                                        class=" bg-yellow-800 text-center rounded-lg p-3">Ver
                                                        Prestamo</a>
                                                @else
                                                    <a href="{{ route('loans.create', $item->id) }}"
                                                        title="Prestar Item"
                                                        class=" bg-gray-900 text-center rounded-lg p-3">Prestar</a>
                                                @endif

                                            </div>
                                        </td>
                                    </tr>
                                @endforeach

                                </td>
                                </tr>
                            </table>

                            <form action="{{ route('items.index') }}">
                                <x-primary-button class="mt-4">{{ __('VOLVER A INICIO') }}</x-primary-button>
                            </form>
                        </form>
                    </div>
                </div>
            </div>
        </div>
</x-app-layout>
