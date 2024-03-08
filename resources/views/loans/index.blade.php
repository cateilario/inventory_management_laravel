<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            PRÉSTAMOS
        </h2>
    </x-slot>
    <div class="w-full mx-auto p-4 sm:p-6 lg:p-8">
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white p-4 shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        <table class="w-full">
                            <thead class="p-3">
                                <tr class="text-gray-900 text-center">
                                    <th class="">Usuario</th>
                                    <th>Ítem</th>
                                    <th>Fecha de préstamo</th>
                                    <th>Fecha de devolución</th>
                                    <th>Fecha de retorno</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            @foreach ($loans as $loan)
                                <tr class="text-center">
                                    <td class="p-3">{{ $users->find($loan->user_id)->name }}</td>
                                    <td>{{ $items->find($loan->item_id)->name }}</td>
                                    <td>{{ $loan->checkout_date }}</td>
                                    <td>{{ $loan->due_date }}</td>
                                    <td>
                                        @if ($loan->returned_date)
                                            {{ $loan->returned_date }}
                                        @else
                                            <span class="bg-red-800 text-white text-sm text-center rounded-lg p-2">NO
                                                DEVUELTO</span>
                                        @endif
                                    </td>
                                    <td>
                                    <td class="text-left">
                                        @if (!$loan->returned_date)
                                            {{-- Mostrar el botón si no hay fecha de retorno --}}
                                            @if ($loan->user_id == Auth::id())
                                                <form action="{{ route('loans.update', $loan->id) }}" method="POST">
                                                    @csrf
                                                    @method('PUT')
                                                    <x-primary-button href="{{ route('loans.update', $loan->id) }}"
                                                        title="Devolver">
                                                        Devolver</x-primary-button>
                                                </form>
                                            @else
                                                <div class=" text-blue-900">
                                                    Prestado a {{ $loan->user->name }}
                                                </div>
                                            @endif
                                        @else
                                            <span class=" text-blue-900">
                                                Préstamo completo
                                            </span>
                                        @endif

                    </div>
                    </td>
                    </td>
                    {{-- <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-center text-sm font-medium ">
                                            @if ($loan->returned_date === null)
                                                @if ($loan->user_id === Auth::id() && $loan->due_date < now())
                                                    <form action="{{ route('loans.update', $loan->id) }}"
                                                        method="POST">
                                                        @csrf
                                                        @method('PUT')
                                                        <button type="submit" class="text-orange-600 ">
                                                            Devolver con retraso
                                                        </button>
                                                    </form>
                                                @elseif ($loan->user_id === Auth::id())
                                                    <form action="{{ route('loans.update', $loan->id) }}"
                                                        method="POST">
                                                        @csrf
                                                        @method('PUT')
                                                        <button type="submit"
                                                            class="bg-gray-900 text-white text-center rounded-lg p-3">
                                                            Devolver
                                                        </button>
                                                    </form>
                                                @else
                                                    <span class="bg-red-800 text-white text-center rounded-lg p-3">No
                                                        devuelto</span>
                                                @endif
                                            @else
                                                {{ $loan->returned_date }}
                                            @endif
                                        </div>
                                    </td> --}}
                    </tr>
                    @endforeach
                    </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    </div>
</x-app-layout>
