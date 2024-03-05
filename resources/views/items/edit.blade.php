<x-app-layout>
    <div class="max-w-2xl mx-auto p-4 sm:p-6 lg:p-8">
        <h1>EDITAR OBJETO</h1>
        <form action="{{ route('items.update', $item->id) }}" method="POST">
            @csrf
            @method('PUT')

            <!-- Aquí van los campos de edición del item -->
            <label for="name">Nombre:</label>
            <input type="text" name="name" placeholder="{{ $item->name }}" required>

            <label for="description">Descripción:</label>
            <textarea name="description" placeholder="{{ $item->description }}" required></textarea>

            <label for="price">Precio:</label>
            <input type="number" name="price" placeholder="{{ $item->price }}" required>
            {{-- <label for="box_id">Caja: </label>
            <select name="box_id" id="box_id">
                @foreach ($boxes as $box)
                    <option value="{{ $box->id }}">{{ $box->label }}</option>
                @endforeach --}}
            <label for="picture">Imagen:</label>
            <input type="file" name="picture" accept="picture/*" required>

            <button type="submit">Guardar cambios</button>
        </form>
    </div>
</x-app-layout>
