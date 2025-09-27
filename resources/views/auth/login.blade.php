<x-guest-layout>
    <x-authentication-card>
        <x-slot name="logo">
            {{-- Logo de GoSports --}}
            <a href="{{ url('/') }}">
                {{-- Si no tienes logo aún, deja esto vacío o agrega un placeholder --}}
                <img src="{{ asset('images/gosport-logo.png') }}" alt="GoSports Logo" class="w-32 mx-auto">
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
                <a href="{{ url('/') }}" class="underline text-sm text-gray-700 hover:text-gray-900">
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
</style>

