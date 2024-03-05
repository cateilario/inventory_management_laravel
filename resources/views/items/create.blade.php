<h1>Crear nuevo objeto</h1>
<form action="{{ route('items.store') }}" method ="POST" enctype="multipart/form-data" class="flex-col">
    {{-- enctype="multipart/form-data"  necesario para gestionar subidas de archivos --}}
    @csrf
    @method('POST')
    <label for="name">Nombre:</label>
    <input type="text" class="form-control" id="name" name="name" required>
    <label for="description">Descripción:</label>
    <input type="text" class="form-control" id="description" name="description" required>
    <label for="price">Precio:</label>
    <input type="text" class="form-control" id="price" name="price" required>
    <label for="picture">Imagen:</label>
    <input type="file" class="form-control-file" id="picture" name="picture" accept="/picture">
    <label for="box_id">Caja:</label>
    <select name="box_id" id="box_id">
        @foreach ($boxes as $box)
            <option value="{{ $box->id }}">{{ $box->label }}</option>
        @endforeach

        <button type="submit" class="btn btn-primary">Añadir objeto</button>
</form>
