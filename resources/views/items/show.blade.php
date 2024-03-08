<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            ITEM - {{ $item->name }}
        </h2>
    </x-slot>
    <div class="w-full mx-auto p-4 sm:p-6 lg:p-8">
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white p-4 shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900 flex justify-between">
                        <form action="{{ route('items.show', $item->id) }}" method="GET">
                            @csrf
                            @method('PUT')
                            <table>
                                <tr>
                                    <td class="text-gray-950 p-3">Descripción: </td>
                                    <td class="p-3">{{ $item->description }}</td>
                                </tr>
                                <tr>
                                    <td class="text-gray-950 p-3">Precio: </td>
                                    <td>{{ $item->price }}</td>
                                </tr>
                                <tr>
                                    @if ($item->box_id != null)
                                        <td class=" text-gray-900 p-3">
                                            Caja: {{ $item->box->label }}</td>
                                    @else
                                        <td class=" text-gray-900 p-3">Sin caja</td>
                                    @endif
                                </tr>
                                <tr>
                                    <td class="text-gray-950 p-3">
                                        <img src="{{ Storage::url($item->picture) }}" alt="imagen-item"
                                            class="w-[100px] h-[100px] mt-4">
                                    </td>
                                </tr>
                            </table>

                            <form action="{{ route('items.index') }}">
                                <x-primary-button class="mt-4">{{ __('VOLVER A INICIO') }}</x-primary-button>
                            </form>
                        </form>
                        <x-dropdown>
                            <x-slot name="trigger">
                                <button>
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-500"
                                        viewBox="0 0 20 20" fill="currentColor">
                                        <path
                                            d="M6 10a2 2 0 11-4 0 2 2 0 014 0zM12 10a2 2 0 11-4 0 2 2 0 014 0zM16 12a2 2 0 100-4 2 2 0 000 4z" />
                                    </svg>
                                </button>
                            </x-slot>
                            <x-slot name="content">
                                <x-dropdown-link :href="route('items.edit', $item)">
                                    {{ __('Edit') }}
                                </x-dropdown-link>
                                <x-dropdown-link :href="route('loans.create', $item)">
                                    {{ __('Prestar') }}
                                </x-dropdown-link>
                                <form method="POST" action="{{ route('items.destroy', $item) }}">
                                    @csrf
                                    @method('delete')
                                    <x-dropdown-link :href="route('items.destroy', $item)"
                                        onclick="event.preventDefault(); this.closest('form').submit();">
                                        {{ __('Delete') }}
                                    </x-dropdown-link>
                                </form>

                            </x-slot>
                        </x-dropdown>
                    </div>
                </div>
            </div>
        </div>
</x-app-layout>
