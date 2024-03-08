<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            ITEMS
        </h2>
    </x-slot>
    <div class="w-full mx-auto p-4 sm:p-6 lg:p-8">
        {{-- Add item --}}
        <form action="{{ route('boxes.create') }}">
            <x-primary-button class="mt-4">{{ __('Añadir caja') }}</x-primary-button>
        </form>

        <div class="w-full mt-6 bg-white p-3 shadow-sm rounded-lg divide-y">
            @foreach ($boxes as $box)
                <div class="p-6 flex space-x-4">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-600 -scale-x-100" fill="none"
                        viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="m20.25 7.5-.625 10.632a2.25 2.25 0 0 1-2.247 2.118H6.622a2.25 2.25 0 0 1-2.247-2.118L3.75 7.5M10 11.25h4M3.375 7.5h17.25c.621 0 1.125-.504 1.125-1.125v-1.5c0-.621-.504-1.125-1.125-1.125H3.375c-.621 0-1.125.504-1.125 1.125v1.5c0 .621.504 1.125 1.125 1.125Z" />
                    </svg>
                    <div class="flex-1">
                        <div class="flex justify-between items-center">
                            <div class="w-1/3">
                                <span class="text-gray-800">{{ $box->label }}</span>
                            </div>
                            <div class="w-1/3">
                                <span class="text-gray-800">{{ $box->location }}</span>
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
                                    <x-dropdown-link :href="route('boxes.show', $box)">
                                        {{ __('Mostrar') }}
                                    </x-dropdown-link>
                                    <x-dropdown-link :href="route('boxes.edit', $box)">
                                        {{ __('Edit') }}
                                    </x-dropdown-link>
                                    <form method="POST" action="{{ route('boxes.destroy', $box) }}">
                                        @csrf
                                        @method('delete')
                                        <x-dropdown-link :href="route('boxes.destroy', $box)"
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
