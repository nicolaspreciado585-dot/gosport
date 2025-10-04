<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard GoSports - Bosa') }}
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
            <div class="bg-white p-6 rounded-xl shadow-lg">
                <h3 class="text-lg font-semibold mb-4">Reservas por deporte</h3>
                <canvas id="reservasChart" height="120"></canvas>
            </div>
            <div class="bg-white p-6 rounded-xl shadow-lg">
                <h3 class="text-lg font-semibold mb-4">Métodos de pago</h3>
                <canvas id="pagosChart" height="120"></canvas>
            </div>
            <div class="bg-white p-6 rounded-xl shadow-lg">
                <h3 class="text-lg font-semibold mb-4">Usuarios por edad</h3>
                <canvas id="usuariosChart" height="120"></canvas>
            </div>
            <div class="bg-white p-6 rounded-xl shadow-lg">
                <h3 class="text-lg font-semibold mb-4">Eventos por mes</h3>
                <canvas id="eventosChart" height="120"></canvas>
            </div>
        </div>

        <!-- Filtro de Canchas -->
        <section>
            <h2 class="text-xl font-semibold mb-4">Canchas en Bosa</h2>
            <div class="flex gap-4 mb-6 flex-wrap">
                <button class="bg-gray-700 text-white px-6 py-2 rounded-lg hover:bg-gray-600" onclick="filtrarCanchas('futbol')">⚽ Fútbol</button>
                <button class="bg-gray-700 text-white px-6 py-2 rounded-lg hover:bg-gray-600" onclick="filtrarCanchas('tenis')">🎾 Tenis</button>
                <button class="bg-gray-700 text-white px-6 py-2 rounded-lg hover:bg-gray-600" onclick="filtrarCanchas('basket')">🏀 Básquetbol</button>
                <button class="bg-indigo-600 text-white px-6 py-2 rounded-lg hover:bg-indigo-500" onclick="filtrarCanchas('all')">🌐 Ver todas</button>
            </div>
            <div id="canchas-lista" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                <!-- Aquí se mostrarán las canchas -->
            </div>
        </section>

        <style>
            @keyframes fadeBounce {
                0% { opacity: 0; transform: translateY(40px) scale(0.95); }
                60% { opacity: 1; transform: translateY(-10px) scale(1.02); }
                80% { transform: translateY(5px) scale(0.98); }
                100% { transform: translateY(0) scale(1); }
            }
            .card-anim {
                animation: fadeBounce 0.8s ease-out forwards;
            }
        </style>

        <script>
            const canchas = {
                futbol: [
                    { nombre: "Cancha Sintética Bosa Centro", direccion: "Cra. 80A #65S-20, Bosa", maps: "https://www.google.com/maps/search/?api=1&query=Cra+80A+65S-20+Bosa", disponible: true, img: "{{ asset('imagenes/Canchabosa1.jpeg') }}" },
                    { nombre: "Polideportivo Bosa Porvenir", direccion: "Cl. 59 Sur #78H-45, Bosa", maps: "https://www.google.com/maps/search/?api=1&query=Calle+59+Sur+78H-45+Bosa", disponible: false, img: "{{ asset('imagenes/Canchabosa2.jpeg') }}" },
                    { nombre: "Cancha Fútbol 11 Bosa Recreo", direccion: "Cl. 71 Sur #79C-50, Bosa", maps: "https://www.google.com/maps/search/?api=1&query=Calle+71+Sur+79C-50+Bosa", disponible: true, img: "{{ asset('imagenes/Canchabosa3.jpeg') }}" }
                ],
                tenis: [
                    { nombre: "Cancha Tenis Bosa La Estación", direccion: "Cl. 65 Sur #80C-15, Bosa", maps: "https://www.google.com/maps/search/?api=1&query=Calle+65+Sur+80C-15+Bosa", disponible: true, img: "{{ asset('imagenes/Tenisbosa1.jpeg') }}" }
                ],
                basket: [
                    { nombre: "Cancha Basket Parque Clarelandia", direccion: "Calle 58 J Sur # 80 D - 10, Bosa", maps: "https://www.google.com/maps/search/?api=1&query=Calle+58+J+Sur+80D-10+Bosa", disponible: true, img: "{{ asset('imagenes/Basket1.jpeg') }}" },
                    { nombre: "Cancha Basket Parque Tibanica", direccion: "Calle 74 Sur # 77 I - 31, Bosa", maps: "https://www.google.com/maps/search/?api=1&query=Calle+74+Sur+77I-31+Bosa", disponible: false, img: "{{ asset('imagenes/Tibanica.jpeg') }}" },
                    { nombre: "Cancha Basket Parque El Porvenir", direccion: "Avenida Calle 54 S # 97-37, Bosa", maps: "https://www.google.com/maps/search/?api=1&query=Avenida+Calle+54+S+97-37+Bosa", disponible: true, img: "{{ asset('imagenes/elporvenir.jpeg') }}" }
                ]
            };

            function filtrarCanchas(deporte) {
                const lista = document.getElementById("canchas-lista");
                lista.innerHTML = "";

                let canchasFiltradas = [];

                if (deporte === "all") {
                    canchasFiltradas = [
                        ...canchas.futbol, 
                        ...canchas.tenis, 
                        ...canchas.basket
                    ];
                } else {
                    canchasFiltradas = canchas[deporte];
                }

                canchasFiltradas.forEach((c, index) => {
                    const card = document.createElement("div");
                    card.className = "bg-white rounded-xl shadow-lg overflow-hidden hover:shadow-2xl transition duration-300 opacity-0";
                    
                    setTimeout(() => {
                        card.classList.add("card-anim");
                        card.classList.remove("opacity-0");
                    }, index * 200);

                    card.innerHTML = `
                        <img src="${c.img}" alt="${c.nombre}" class="w-full h-40 object-cover">
                        <div class="p-5">
                            <h3 class="text-lg font-bold">${c.nombre}</h3>
                            <p class="text-sm text-gray-500 mt-1">
                                📍 <a href="${c.maps}" target="_blank" class="text-indigo-600 hover:underline">
                                    ${c.direccion}
                                </a>
                            </p>
                            <span class="inline-block mt-2 px-3 py-1 text-xs font-semibold rounded-full ${c.disponible ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800'}">
                                ${c.disponible ? 'Disponible' : 'Ocupada'}
                            </span>
                            ${c.disponible ? `
                                <a href="/reservas/create" 
                                   class="block mt-4 text-center bg-indigo-600 text-white px-4 py-2 rounded-lg hover:bg-indigo-500">
                                    Reservar
                                </a>` : `
                                <button disabled 
                                   class="block mt-4 text-center bg-gray-400 text-white px-4 py-2 rounded-lg cursor-not-allowed">
                                    No disponible
                                </button>`}
                        </div>
                    `;
                    lista.appendChild(card);
                });
            }

            // Mostrar todas al inicio
            document.addEventListener("DOMContentLoaded", () => filtrarCanchas('all'));
        </script>
    </div>
</x-app-layout>
