<x-app-layout>
    <x-slot name="header">
        <br><br><br>
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Historial de Reservas') }}
        </h2>
    </x-slot>

    <div class="py-8 px-6 bg-gray-100 min-h-screen">
        <div class="max-w-6xl mx-auto bg-white rounded-2xl shadow-lg p-6">
            
            {{-- Mensaje de éxito --}}
            @if(session('success'))
                <div class="mb-4 p-4 bg-green-100 border border-green-300 text-green-800 rounded-lg">
                    {{ session('success') }}
                </div>
            @endif

            {{-- Filtro y botón nueva reserva --}}
            <div class="mb-6 flex flex-col md:flex-row justify-between items-start md:items-center gap-4">
                <form method="GET" action="{{ route('reservas.historial') }}" class="flex items-center gap-2">
                    <label for="estado" class="font-semibold">Filtrar por estado:</label>
                    <select name="estado" id="estado" onchange="this.form.submit()" 
                        class="border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-indigo-400 focus:outline-none">
                        <option value="">Todos</option>
                        <option value="pendiente" {{ request('estado') == 'pendiente' ? 'selected' : '' }}>Pendiente</option>
                        <option value="confirmada" {{ request('estado') == 'confirmada' ? 'selected' : '' }}>Confirmada</option>
                        <option value="cancelada" {{ request('estado') == 'cancelada' ? 'selected' : '' }}>Cancelada</option>
                    </select>
                </form>

                <a href="{{ route('reservas.create') }}" 
                   class="bg-indigo-600 hover:bg-indigo-500 text-white font-medium px-4 py-2 rounded-lg transition duration-150">
                    Nueva Reserva
                </a>
            </div>

            {{-- Tabla de reservas --}}
            <div class="overflow-x-auto">
                <table class="min-w-full border border-gray-300 rounded-lg overflow-hidden">
                    <thead class="bg-gray-800 text-white">
                        <tr>
                            <th class="px-4 py-3 text-left">ID</th>
                            <th class="px-4 py-3 text-left">Cancha</th>
                            <th class="px-4 py-3 text-left">Fecha</th>
                            <th class="px-4 py-3 text-left">Hora Inicio</th>
                            <th class="px-4 py-3 text-left">Estado</th>
                            <th class="px-4 py-3 text-center">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($reservas as $reserva)
                            <tr class="border-t hover:bg-gray-50 transition">
                                <td class="px-4 py-2">{{ $reserva->id_reserva }}</td>
                                <td class="px-4 py-2">{{ $reserva->cancha->nombre ?? 'N/A' }}</td>
                                <td class="px-4 py-2">{{ \Carbon\Carbon::parse($reserva->fecha_inicio)->format('Y-m-d') }}</td>
                                <td class="px-4 py-2">{{ \Carbon\Carbon::parse($reserva->fecha_inicio)->format('H:i') }}</td>
                                <td class="px-4 py-2">
                                    @if($reserva->estado == 'pendiente')
                                        <span class="bg-yellow-100 text-yellow-800 px-2 py-1 rounded-full text-sm font-medium">Pendiente</span>
                                    @elseif($reserva->estado == 'confirmada')
                                        <span class="bg-green-100 text-green-800 px-2 py-1 rounded-full text-sm font-medium">Confirmada</span>
                                    @elseif($reserva->estado == 'cancelada')
                                        <span class="bg-red-100 text-red-800 px-2 py-1 rounded-full text-sm font-medium">Cancelada</span>
                                    @else
                                        <span class="bg-gray-100 text-gray-800 px-2 py-1 rounded-full text-sm font-medium">{{ $reserva->estado }}</span>
                                    @endif
                                </td>
                                <td class="px-4 py-2 text-center">
                                    <div class="flex justify-center gap-2">
                                        <a href="{{ route('reservas.edit', $reserva->id_reserva) }}" 
                                           class="bg-yellow-500 hover:bg-yellow-400 text-white font-medium px-3 py-1.5 rounded-lg text-sm transition">
                                            Editar
                                        </a>
                                        <form action="{{ route('reservas.destroy', $reserva->id_reserva) }}" method="POST" 
                                              onsubmit="return confirm('¿Estás seguro de eliminar esta reserva?')" class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" 
                                                class="bg-red-600 hover:bg-red-500 text-white font-medium px-3 py-1.5 rounded-lg text-sm transition">
                                                Eliminar
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center py-4 text-gray-500">
                                    No tienes reservas registradas.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            {{-- Paginación --}}
            <div class="mt-6">
                {{ $reservas->withQueryString()->links() }}
            </div>
        </div>
    </div>
    <x-footer />    
</x-app-layout>
