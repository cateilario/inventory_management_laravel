<x-app-layout>
    <h1>ITEM {{ $item->name }}</h1>
    <form action="{{ route('items.show', $item->id) }}" method="GET">
        @csrf
        @method('PUT')

        <table>
            <tr>
                <td>Nombre: </td>
                <td>{{ $item->name }}</td>
            </tr>
            <tr>
                <td>Descripción: </td>
                <td>{{ $item->description }}</td>
            </tr>
            <tr>
                <td>Precio: </td>
                <td>{{ $item->price }}</td>
            </tr>
            <tr>
                <td>Caja</td>
                <td>{{ $item->box->label }}</td>
            </tr>
            <tr>
                <td>
                    <img src="{{ Storage::url($item->picture) }}" alt="Item photo" style="width: 100px; height: auto;">
                </td>
            </tr>

        </table>

    </form>

</x-app-layout>
