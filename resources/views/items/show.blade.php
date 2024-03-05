<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            ITEM - {{ $item->name }}
        </h2>
    </x-slot>
    <div class="max-w-2xl mx-auto p-4 sm:p-6 lg:p-8">
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        <form action="{{ route('items.show', $item->id) }}" method="GET">
                            @csrf
                            @method('PUT')

                            <table>
                                <tr>
                                    <td>Descripción: </td>
                                    <td>{{ $item->description }}</td>
                                </tr>
                                <tr>
                                    <td>Precio: </td>
                                    <td>{{ $item->price }}</td>
                                </tr>
                                <tr>
                                    <td>Caja:</td>
                                    <td>{{ $item->box->label }}</td>
                                </tr>
                                <tr>
                                    <td>
                                        <img src="{{ asset(Storage::url($item->picture)) }}" alt="imagen-item"
                                            class="w-[100px] h-[100px] mt-4">
                                    </td>
                                </tr>

                            </table>
                        </form>
                    </div>
                </div>
            </div>
        </div>
</x-app-layout>
