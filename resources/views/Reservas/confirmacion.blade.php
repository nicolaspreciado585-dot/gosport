<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Reserva Exitosa') }}
        </h2>
    </x-slot>

    <div class="py-8 px-6 bg-gray-100 min-h-screen">
        <div class="max-w-2xl mx-auto bg-white p-6 rounded-2xl shadow-lg text-center animate-fadeIn">
            <h3 class="text-2xl font-bold mb-4">¡Tu reserva ha sido registrada!</h3>
            <p class="mb-6">Gracias por reservar con GoSports. Te esperamos en la cancha.</p>
            <a href="{{ route('dashboard') }}" class="inline-block bg-indigo-600 text-white px-6 py-2 rounded-lg hover:bg-indigo-500 transition">
                Volver al Dashboard
            </a>
        </div>
    </div>

    <style>
        @keyframes fadeIn { 0% { opacity: 0; transform: translateY(20px);} 100% {opacity:1; transform: translateY(0);} }
        .animate-fadeIn { animation: fadeIn 0.8s ease-out forwards; }
    </style>
</x-app-layout>

