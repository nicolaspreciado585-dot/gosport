<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-black leading-tight">
            {{ __('Dashboard GoSports') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">

                <!-- Tarjeta Reservas -->
                <div class="bg-gray-800 text-white shadow-lg rounded-lg p-6">
                    <h3 class="text-lg font-bold mb-2">Reservas Activas</h3>
                    <p class="text-3xl font-extrabold">{{ $reservas ?? 0 }}</p>
                </div>

                <!-- Tarjeta Usuarios -->
                <div class="bg-gray-700 text-white shadow-lg rounded-lg p-6">
                    <h3 class="text-lg font-bold mb-2">Usuarios Registrados</h3>
                    <p class="text-3xl font-extrabold">{{ $usuarios ?? 0 }}</p>
                </div>

                <!-- Tarjeta Canchas -->
                <div class="bg-gray-600 text-white shadow-lg rounded-lg p-6">
                    <h3 class="text-lg font-bold mb-2">Canchas Disponibles</h3>
                    <p class="text-3xl font-extrabold">{{ $canchas ?? 0 }}</p>
                </div>

            </div>

            <!-- Gráfico simple con Chart.js -->
            <div class="mt-12 bg-white shadow-lg rounded-lg p-6">
                <h3 class="text-lg font-bold mb-4 text-black">Reservas por mes</h3>
                <canvas id="chartReservas"></canvas>
            </div>
        </div>
    </div>
</x-app-layout>

<!-- Chart.js -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
const ctx = document.getElementById('chartReservas').getContext('2d');
const chartReservas = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio'],
        datasets: [{
            label: 'Reservas',
            data: [12, 19, 7, 15, 10, 20],
            backgroundColor: 'rgba(30, 30, 30, 0.7)',
            borderColor: 'rgba(0,0,0,1)',
            borderWidth: 1
        }]
    },
    options: {
        responsive: true,
        scales: {
            y: { beginAtZero: true }
        }
    }
});
</script>

<style>
body, h2, h3, p { font-family: 'Roboto', sans-serif; }
</style>
