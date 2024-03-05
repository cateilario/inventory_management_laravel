<x-app-layout>
    <div class="max-w-2xl mx-auto p-4 sm:p-6 lg:p-8">
        <form method="POST" action="{{ route('items.index') }}">
            @csrf
            <textarea name="message" placeholder="{{ __('Nombre del item a buscar...') }}"
                class="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">
            </textarea>
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
            <x-primary-button class="mt-4">{{ __('Buscar') }}</x-primary-button>
        </form>

        <form action="{{ route('items.create') }}">
            <x-primary-button class="mt-4">{{ __('Añadir Item') }}</x-primary-button>
        </form>

        <div class="mt-6 bg-white shadow-sm rounded-lg divide-y">
            @foreach ($items as $item)
                <div class="p-6 flex space-x-4">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-600 -scale-x-100" fill="none"
                        viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="m20.25 7.5-.625 10.632a2.25 2.25 0 0 1-2.247 2.118H6.622a2.25 2.25 0 0 1-2.247-2.118L3.75 7.5M10 11.25h4M3.375 7.5h17.25c.621 0 1.125-.504 1.125-1.125v-1.5c0-.621-.504-1.125-1.125-1.125H3.375c-.621 0-1.125.504-1.125 1.125v1.5c0 .621.504 1.125 1.125 1.125Z" />
                    </svg>

                    <div class="flex-1">
                        <div class="flex justify-between items-center">
                            <div>
                                <span class="text-gray-800">{{ $item->name }}</span>
                            </div>
                            <x-dropdown>
                                <x-slot name="trigger">
                                    <button>Prestar</button>
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
                                    {{-- <x-dropdown-link :href="route('loans.create', $item)">
                                        {{ __('Prestar') }}
                                    </x-dropdown-link> --}}
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
            @endforeach
        </div>
    </div>
</x-app-layout>
