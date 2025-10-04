<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Reservar Cancha') }}
        </h2>
    </x-slot>

    <div class="py-8 px-6 bg-gray-100 min-h-screen flex justify-center">
        <div class="bg-white rounded-xl shadow-lg w-full max-w-3xl p-6">

            <!-- Vista previa de la cancha seleccionada -->
            @isset($canchaSeleccionada)
                <div class="mb-6 p-4 bg-indigo-50 rounded-lg flex items-center gap-4">
                    <svg class="w-6 h-6 text-indigo-500" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 8v4l3 3"></path>
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 8V4m0 0L8 8m4-4l4 4"></path>
                    </svg>
                    <div>
                        <p class="text-indigo-700 font-semibold">Cancha seleccionada:</p>
                        <p class="font-bold text-gray-800">{{ $canchaSeleccionada }}</p>
                    </div>
                </div>
            @endisset

            <form action="#" method="POST" class="space-y-6">
                @csrf

                <!-- Nombre del usuario -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Nombre completo</label>
                    <input type="text" name="nombre" placeholder="Juan Pérez" 
                           class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500">
                </div>

                <!-- Correo -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Correo electrónico</label>
                    <input type="email" name="email" placeholder="correo@ejemplo.com" 
                           class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500">
                </div>

                <!-- Fecha de reserva -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Fecha</label>
                    <input type="date" name="fecha" 
                           class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500">
                </div>

                <!-- Hora de reserva -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Hora</label>
                    <input type="time" name="hora" 
                           class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500">
                </div>

                <!-- Deporte -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Deporte</label>
                    <select name="deporte" class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500">
                        <option value="">Selecciona un deporte</option>
                        <option value="futbol">Fútbol</option>
                        <option value="tenis">Tenis</option>
                        <option value="basket">Básquetbol</option>
                    </select>
                </div>

                <!-- Botón reservar -->
                <div class="text-right">
                    <button type="submit" 
                            class="bg-indigo-600 text-white px-6 py-2 rounded-lg hover:bg-indigo-500 transition duration-300">
                        Reservar
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>

