<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            ITEMS
        </h2>
    </x-slot>
    <div class="w-full mx-auto p-4 sm:p-6 lg:p-8">
        {{-- Search --}}
        <form>
            @csrf
            <input type="text" name="search" id="search" placeholder="{{ __('Nombre del item a buscar...') }}"
                class="block w-1/2 border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">
            </input>
            <x-primary-button class="mt-4">{{ __('Buscar') }}</x-primary-button>
        </form>
        {{-- Add item --}}
        <form action="{{ route('items.create') }}">
            <x-primary-button class="mt-4">{{ __('Añadir Item') }}</x-primary-button>
        </form>

        <div class="w-full mt-6 bg-white p-3 shadow-sm rounded-lg divide-y">
            @foreach ($items as $item)
                <div class="p-6 flex justify-around items-center space-x-4 w-full">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-600 -scale-x-100" fill="none"
                        viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="m20.25 7.5-.625 10.632a2.25 2.25 0 0 1-2.247 2.118H6.622a2.25 2.25 0 0 1-2.247-2.118L3.75 7.5M10 11.25h4M3.375 7.5h17.25c.621 0 1.125-.504 1.125-1.125v-1.5c0-.621-.504-1.125-1.125-1.125H3.375c-.621 0-1.125.504-1.125 1.125v1.5c0 .621.504 1.125 1.125 1.125Z" />
                    </svg>
                    <div>
                        <span class="text-gray-800 w-1/3">{{ $item->name }}</span>
                    </div>
                    <div>
                        <span class="text-gray-800 w-1/3">{{ $item->box ? $item->box->label : 'Sin caja' }}</span>
                    </div>
                    <x-dropdown class="w-1/3">
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
                            @if ($item->activeLoan())
                                <x-dropdown-link :href="route('loans.index', $item->activeLoan()->id)">
                                    {{ __('Ver préstamo') }}
                                </x-dropdown-link>
                            @else
                                <x-dropdown-link :href="route('loans.create', ['item_id' => $item->id])">
                                    {{ __('Prestar') }}
                                </x-dropdown-link>
                            @endif

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
            @endforeach
        </div>
    </div>
</x-app-layout>
