<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Reservar cancha') }}
        </h2>
    </x-slot>

    <div class="py-8 px-6 bg-gray-100 min-h-screen">
        <div class="max-w-3xl mx-auto bg-white p-6 rounded-2xl shadow-lg">

            {{-- Si recibes una cancha específica, mostrar su tarjeta --}}
            @isset($cancha)
            <div class="flex flex-col md:flex-row items-center md:items-start gap-6 mb-6 animate-fadeIn">
                <img src="{{ asset($cancha->foto) }}"
                     alt="{{ $cancha->nombre }}"
                     class="w-full md:w-48 h-48 object-cover rounded-xl shadow-md">
                <div class="flex-1">
                    <h3 class="text-2xl font-bold text-gray-800 mb-2">{{ $cancha->nombre }}</h3>
                    <p class="text-gray-600 mb-1">📍 {{ $cancha->direccion->direccion ?? 'Sin dirección' }}</p>
                    <p class="text-gray-600 mb-1">🏷️ Deporte: {{ $cancha->deporte->nombre ?? 'Sin deporte' }}</p>
                    <span class="inline-block mt-2 px-3 py-1 text-sm font-semibold rounded-full 
                        {{ $cancha->estado === 'disponible' ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                        {{ ucfirst($cancha->estado) }}
                    </span>
                </div>
            </div>
            @endisset

            @auth
            <!-- FORMULARIO DE RESERVA -->
            <form id="reservaForm" class="space-y-4" onsubmit="return validarFormulario()" 
                  action="{{ route('reservas.store') }}" method="POST">
                @csrf

                {{-- Si hay $cancha: enviar id_cancha oculto; si no, mostrar select con $canchas --}}
                @isset($cancha)
                    <input type="hidden" name="id_cancha" value="{{ $cancha->id_cancha }}">
                @else
                    <div>
                        <label class="block text-gray-700 font-semibold mb-1">Selecciona una cancha</label>
                        <select name="id_cancha" required
                                class="w-full border-gray-300 rounded-lg shadow-sm px-3 py-2">
                            <option value="">-- Selecciona --</option>
                            @if(isset($canchas) && $canchas->count())
                                @foreach($canchas as $c)
                                    <option value="{{ $c->id_cancha }}" {{ old('id_cancha') == $c->id_cancha ? 'selected' : '' }}>
                                        {{ $c->nombre }} — {{ $c->direccion->direccion ?? '' }}
                                    </option>
                                @endforeach
                            @endif
                        </select>
                        @error('id_cancha')
                            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                @endisset

                <div>
                    <label class="block text-gray-700 font-semibold mb-1">Nombre del usuario</label>
                    <input type="text" value="{{ auth()->user()->name }}" readonly
                           class="w-full border-gray-300 rounded-lg shadow-sm bg-gray-100 cursor-not-allowed">
                </div>

                <div>
                    <label class="block text-gray-700 font-semibold mb-1">Fecha</label>
                    <input type="date" name="fecha" id="fecha"
                           value="{{ old('fecha') }}"
                           class="w-full border-gray-300 rounded-lg shadow-sm" required>
                    @error('fecha')
                        <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                    @enderror
                    <p id="error_fecha" class="text-red-600 text-sm mt-1 hidden">Debes seleccionar una fecha</p>
                </div>

                <div>
                    <label class="block text-gray-700 font-semibold mb-1">Hora inicio</label>
                    <input type="time" name="hora_inicio" id="hora_inicio"
                           value="{{ old('hora_inicio') }}"
                           class="w-full border-gray-300 rounded-lg shadow-sm" required>
                    @error('hora_inicio')
                        <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                    @enderror
                    <p id="error_hora_inicio" class="text-red-600 text-sm mt-1 hidden">Debes seleccionar la hora de inicio</p>
                </div>

                <div>
                    <label class="block text-gray-700 font-semibold mb-1">Hora fin</label>
                    <input type="time" name="hora_fin" id="hora_fin"
                           value="{{ old('hora_fin') }}"
                           class="w-full border-gray-300 rounded-lg shadow-sm" required>
                    @error('hora_fin')
                        <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                    @enderror
                    <p id="error_hora_fin" class="text-red-600 text-sm mt-1 hidden">Debes seleccionar la hora de fin</p>
                </div>

                <button type="submit" 
                        class="w-full bg-indigo-600 text-white px-4 py-2 rounded-lg hover:bg-indigo-500 transition">
                    Confirmar reserva
                </button>
            </form>

            <script>
                function validarFormulario() {
                    let valido = true;
                    document.querySelectorAll('p.text-red-600').forEach(el => el.classList.add('hidden'));

                    const fecha = document.getElementById('fecha').value;
                    const inicio = document.getElementById('hora_inicio').value;
                    const fin = document.getElementById('hora_fin').value;

                    if (!fecha) {
                        document.getElementById('error_fecha').classList.remove('hidden');
                        valido = false;
                    }
                    if (!inicio) {
                        document.getElementById('error_hora_inicio').classList.remove('hidden');
                        valido = false;
                    }
                    if (!fin) {
                        document.getElementById('error_hora_fin').classList.remove('hidden');
                        valido = false;
                    }

                    if (inicio && fin && inicio >= fin) {
                        alert("La hora de fin debe ser mayor que la hora de inicio");
                        valido = false;
                    }

                    // ⏰ Nueva validación: máximo 11:59 p.m.
                    if (fin && fin > "23:59") {
                        alert("La hora de fin no puede superar las 11:59 p.m.");
                        valido = false;
                    }


                    return valido;
                }
            </script>

            @else
            <div class="text-center py-8">
                <p class="text-gray-700 mb-4">Debes iniciar sesión para reservar una cancha.</p>
                <a href="{{ route('login') }}" class="inline-block bg-indigo-600 text-white px-6 py-2 rounded-lg hover:bg-indigo-500">
                    Iniciar sesión
                </a>
            </div>
            @endauth
        </div>
    </div>

    <style>
        @keyframes fadeIn { 
            0% { opacity: 0; transform: translateY(20px);} 
            100% {opacity:1; transform: translateY(0);} 
        }
        .animate-fadeIn { animation: fadeIn 0.8s ease-out forwards; }
    </style>
</x-app-layout>
