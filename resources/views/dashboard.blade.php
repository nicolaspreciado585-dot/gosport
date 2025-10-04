<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard GoSports') }}
        </h2>
    </x-slot>

    <div class="py-8 px-6 bg-gray-100 min-h-screen">
        <!-- Métricas -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-10">
            <div class="bg-gray-800 text-white rounded-xl p-6 shadow-lg">
                <h3 class="text-lg">Usuarios</h3>
                <p class="text-3xl font-bold">120</p>
            </div>
            <div class="bg-gray-800 text-white rounded-xl p-6 shadow-lg">
                <h3 class="text-lg">Reservas</h3>
                <p class="text-3xl font-bold">85</p>
            </div>
            <div class="bg-gray-800 text-white rounded-xl p-6 shadow-lg">
                <h3 class="text-lg">Pagos</h3>
                <p class="text-3xl font-bold">$3.500.000</p>
            </div>
            <div class="bg-gray-800 text-white rounded-xl p-6 shadow-lg">
                <h3 class="text-lg">Eventos</h3>
                <p class="text-3xl font-bold">12</p>
            </div>
        </div>
        <!-- Gráficas -->
<div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-10">
    <!-- Reservas -->
    <div class="bg-white p-6 rounded-xl shadow-lg">
        <h3 class="text-lg font-semibold mb-4">Reservas por deporte</h3>
        <canvas id="reservasChart" height="120"></canvas>
    </div>

    <!-- Pagos -->
    <div class="bg-white p-6 rounded-xl shadow-lg">
        <h3 class="text-lg font-semibold mb-4">Métodos de pago</h3>
        <canvas id="pagosChart" height="120"></canvas>
    </div>

    <!-- Usuarios -->
    <div class="bg-white p-6 rounded-xl shadow-lg">
        <h3 class="text-lg font-semibold mb-4">Usuarios por edad</h3>
        <canvas id="usuariosChart" height="120"></canvas>
    </div>

    <!-- Eventos -->
    <div class="bg-white p-6 rounded-xl shadow-lg">
        <h3 class="text-lg font-semibold mb-4">Eventos por mes</h3>
        <canvas id="eventosChart" height="120"></canvas>
    </div>
</div>





        <!-- Filtro de Canchas -->
        <section>
            <h2 class="text-xl font-semibold mb-4">Canchas disponibles</h2>
            <div class="flex gap-4 mb-6">
                <button class="bg-gray-700 text-white px-6 py-2 rounded-lg hover:bg-gray-600" onclick="filtrarCanchas('futbol')">⚽ Fútbol</button>
                <button class="bg-gray-700 text-white px-6 py-2 rounded-lg hover:bg-gray-600" onclick="filtrarCanchas('tenis')">🎾 Tenis</button>
                <button class="bg-gray-700 text-white px-6 py-2 rounded-lg hover:bg-gray-600" onclick="filtrarCanchas('basket')">🏀 Básquetbol</button>
            </div>
            <div id="canchas-lista" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                <!-- Aquí se mostrarán las canchas -->
            </div>
        </section>
    </div>
    


    <script>
        const canchas = {
            futbol: ["Fútbol 5 - Norte", "Fútbol 8 - Centro"],
            tenis: ["Cancha Tenis 1", "Cancha Tenis 2"],
            basket: ["Cancha Basket Sur", "Cancha Basket Principal"]
        };

        function filtrarCanchas(deporte) {
            const lista = document.getElementById("canchas-lista");
            lista.innerHTML = "";
            canchas[deporte].forEach(c => {
                const card = document.createElement("div");
                card.className = "bg-white p-6 rounded-xl shadow-lg hover:bg-gray-100 cursor-pointer";
                card.innerHTML = `
                    <h3 class="text-lg font-bold">${c}</h3>
                    <p class="text-sm text-gray-500">Disponible</p>
                    <a href="/reservas/create" 
                       class="inline-block mt-3 bg-indigo-600 text-white px-4 py-2 rounded-lg hover:bg-indigo-500">
                        Reservar
                    </a>`;
                lista.appendChild(card);
            });
        }
    </script>
</x-app-layout>

