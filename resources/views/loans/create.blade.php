<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            NUEVO PRÉSTAMO
        </h2>
    </x-slot>
    <div class="max-w-2xl mx-auto p-4 sm:p-6 lg:p-8">
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        <form action="{{ route('loans.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <div>
                                <label for="item_id">Item:</label>
                                <select name="item_id" id="item_id">
                                    <option value="">Selecciona un item: </option>
                                    @foreach ($items as $item)
                                        @if (!$item->activeLoan())
                                            <option value="{{ $item->id }}"
                                                {{ old('item_id', isset($selectedItem) ? $selectedItem : '') == $item->id ? 'selected' : '' }}>
                                                {{ $item->name }}
                                            </option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>

                            <div>
                                <label for="due_date">Fecha devolución:</label>
                                <input type="date" name="due_date" id="due_date"
                                    value="{{ date('Y-m-d', strtotime('+2 weeks')) }}">
                            </div>

                            <div>
                                <x-primary-button type="submit"
                                    class="mt-4">{{ __('Crear préstamo') }}</x-primary-button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
