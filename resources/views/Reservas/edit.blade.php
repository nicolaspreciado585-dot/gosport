<x-app-layout>
    <x-slot name="header">
        <br><br><br>
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Editar Reserva') }}
        </h2>
    </x-slot>

    <div class="py-8 px-6 bg-gray-100 min-h-screen">
        <div class="max-w-3xl mx-auto bg-white rounded-2xl shadow-lg p-8">
            
            {{-- Mensaje de éxito --}}
            @if(session('success'))
                <div class="mb-4 p-4 bg-green-100 border border-green-300 text-green-800 rounded-lg">
                    {{ session('success') }}
                </div>
            @endif

            {{-- Formulario de edición --}}
            <form method="POST" action="{{ route('reservas.update', $reserva->id_reserva) }}">
                @csrf
                @method('PUT')

                {{-- Selección de cancha --}}
                <div class="mb-5">
                    <label for="id_cancha" class="block text-gray-700 font-semibold mb-2">Cancha</label>
                    <select name="id_cancha" id="id_cancha" class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring focus:ring-indigo-200">
                        @foreach($canchas as $cancha)
                            <option value="{{ $cancha->id_cancha }}" {{ $reserva->id_cancha == $cancha->id_cancha ? 'selected' : '' }}>
                                {{ $cancha->nombre }}
                            </option>
                        @endforeach
                    </select>
                </div>

                {{-- Fecha inicio --}}
                <div class="mb-5">
                    <label for="fecha_inicio" class="block text-gray-700 font-semibold mb-2">Fecha de Inicio</label>
                    <input type="datetime-local" name="fecha_inicio" id="fecha_inicio"
                        value="{{ \Carbon\Carbon::parse($reserva->fecha_inicio)->format('Y-m-d\TH:i') }}"
                        class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring focus:ring-indigo-200">
                </div>

                {{-- Fecha fin --}}
                <div class="mb-5">
                    <label for="fecha_fin" class="block text-gray-700 font-semibold mb-2">Fecha de Fin</label>
                    <input type="datetime-local" name="fecha_fin" id="fecha_fin"
                        value="{{ \Carbon\Carbon::parse($reserva->fecha_fin)->format('Y-m-d\TH:i') }}"
                        class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring focus:ring-indigo-200">
                </div>

                {{-- Estado --}}
                <div class="mb-5">
                    <label for="estado" class="block text-gray-700 font-semibold mb-2">Estado</label>
                    <select name="estado" id="estado" class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring focus:ring-indigo-200">
                        <option value="pendiente" {{ $reserva->estado == 'pendiente' ? 'selected' : '' }}>Pendiente</option>
                        <option value="confirmada" {{ $reserva->estado == 'confirmada' ? 'selected' : '' }}>Confirmada</option>
                        <option value="cancelada" {{ $reserva->estado == 'cancelada' ? 'selected' : '' }}>Cancelada</option>
                    </select>
                </div>

                {{-- Botones --}}
                <div class="flex justify-end gap-3 mt-6">
                    <a href="{{ route('reservas.historial') }}" 
                       class="bg-gray-500 hover:bg-gray-400 text-white px-4 py-2 rounded-lg transition">
                        Cancelar
                    </a>
                    <button type="submit" 
                            class="bg-indigo-600 hover:bg-indigo-500 text-white px-4 py-2 rounded-lg transition">
                        Guardar Cambios
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
