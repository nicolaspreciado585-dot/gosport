<x-guest-layout>
    <x-authentication-card>
        <x-slot name="logo">
            {{-- Logo de GoSports --}}
            <a href="{{ url('/') }}">
               <img src="{{ asset('imagenes/Logo_Gosport.jpeg') }}" alt="GoSports Logo" class="w-32 mx-auto">
            </a>
        </x-slot>

        <x-validation-errors class="mb-4" />

        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div>
                <x-label for="email" value="{{ __('Correo Electrónico') }}" class="text-gray-900 fw-bold"/>
                <x-input id="email" class="block mt-1 w-full border-gray-700" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            </div>

            <div class="mt-4">
                <x-label for="password" value="{{ __('Contraseña') }}" class="text-gray-900 fw-bold"/>
                <x-input id="password" class="block mt-1 w-full border-gray-700" type="password" name="password" required autocomplete="current-password" />
            </div>

            <div class="block mt-4">
                <label for="remember_me" class="flex items-center">
                    <x-checkbox id="remember_me" name="remember" />
                    <span class="ms-2 text-sm text-gray-600">{{ __('Recordarme') }}</span>
                </label>
            </div>

            <div class="flex items-center justify-between mt-4">
                <a href="/" class="underline text-sm text-gray-700 hover:text-gray-900">
                    {{ __('← Atrás') }}
                </a>

                <x-button class="ms-4 bg-gray-900 hover:bg-gray-700 text-white">
                    {{ __('Iniciar Sesión') }}
                </x-button>
            </div>

            @if (Route::has('password.request'))
                <div class="mt-2 text-right">
                    <a class="underline text-sm text-gray-700 hover:text-gray-900" href="{{ route('password.request') }}">
                        {{ __('¿Olvidaste tu contraseña?') }}
                    </a>
                </div>
            @endif
        </form>

        {{-- Sección de registro moderna --}}
        <div class="mt-8 pt-6 border-t border-gray-200">
            <div class="text-center">
                <p class="text-sm text-gray-600 mb-4">
                    ¿No tienes cuenta aún?
                </p>
                
                <div class="bg-gradient-to-r from-orange-500 to-red-500 p-4 rounded-lg shadow-lg">
                    <h3 class="text-white font-bold text-lg mb-2">
                        ¡Únete a GoSports!
                    </h3>
                    <p class="text-orange-100 text-sm mb-4">
                        Reserva canchas, organiza partidos y conecta con otros deportistas
                    </p>
                    
                    <div class="flex items-center justify-center space-x-4 mb-4 text-orange-100">
                        <div class="flex items-center">
                            <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                            </svg>
                            <span class="text-xs">Gratis</span>
                        </div>
                        <div class="flex items-center">
                            <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                            </svg>
                            <span class="text-xs">Fácil</span>
                        </div>
                        <div class="flex items-center">
                            <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                            </svg>
                            <span class="text-xs">Rápido</span>
                        </div>
                    </div>
                    
                    <a href="{{ route('register') }}" class="inline-block bg-white text-orange-600 font-bold py-2 px-6 rounded-full hover:bg-orange-50 hover:shadow-xl transform hover:scale-105 transition-all duration-200">
                        Crear cuenta gratis
                    </a>
                </div>
                
                <p class="text-xs text-gray-500 mt-3">
                    Solo toma 30 segundos registrarse
                </p>
            </div>
        </div>
    </x-authentication-card>
</x-guest-layout>

<style>
/* Paleta de colores GoSports - negro, blanco, gris */
body, input, button, select, textarea {
    font-family: 'Roboto', sans-serif;
}
.fw-bold { font-weight: 700; }
.border-gray-700 { border-color: #4B5563; }
.bg-gray-900 { background-color: #111827; }
.hover\:bg-gray-700:hover { background-color: #374151; }
.text-gray-900 { color: #111827; }
.text-gray-600 { color: #4B5563; }

/* Animación del botón de registro */
@keyframes pulse-orange {
    0%, 100% { box-shadow: 0 0 0 0 rgba(249, 115, 22, 0.4); }
    50% { box-shadow: 0 0 0 10px rgba(249, 115, 22, 0); }
}
</style>
