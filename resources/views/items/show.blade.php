<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            ITEM - {{ $item->name }}
        </h2>
    </x-slot>
    <div class="max-w-2xl mx-auto p-4 sm:p-6 lg:p-8">
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900 flex justify-between">
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
                                        <img src="{{ Storage::url($item->picture) }}" alt="imagen-item"
                                            class="w-[100px] h-[100px] mt-4">
                                    </td>
                                </tr>

                            </table>
                        </form>
                        <x-dropdown>
                            <x-slot name="trigger">
                                <button>
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-400"
                                        viewBox="0 0 20 20" fill="currentColor">
                                        <path
                                            d="M6 10a2 2 0 11-4 0 2 2 0 014 0zM12 10a2 2 0 11-4 0 2 2 0 014 0zM16 12a2 2 0 100-4 2 2 0 000 4z" />
                                    </svg>
                                </button>
                            </x-slot>
                            <x-slot name="content">
                                <x-dropdown-link :href="route('items.show', $item)">
                                    {{ __('Mostrar') }}
                                </x-dropdown-link>
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
