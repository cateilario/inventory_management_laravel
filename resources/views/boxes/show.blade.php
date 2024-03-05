<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Cajas') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form action="{{ route('boxes.show', $box->id) }}" method="GET">
                        @csrf
                        @method('PUT')

                        <table>
                            <tr>
                                <td>Nombre: </td>
                                <td>{{ $box->label }}</td>
                            </tr>
                            <tr>
                                <td>Detalles: </td>
                                <td>{{ $box->location }}</td>
                            </tr>
                        </table>

                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
