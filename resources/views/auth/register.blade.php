<x-guest-layout>
    <x-authentication-card>
        <x-slot name="logo">
            {{-- Logo de GoSports --}}
            <a href="{{ url('/') }}">
                <img src="{{ asset('images/gosport-logo.png') }}" alt="GoSports Logo" class="w-32 mx-auto">
            </a>
        </x-slot>

        <x-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('register') }}">
            @csrf

            {{-- Campos nombre y apellidos lado a lado --}}
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <x-label for="name" value="{{ __('Nombre') }}" class="text-gray-900 fw-bold"/>
                    <x-input id="name" class="block mt-1 w-full border-gray-700" type="text" name="name" :value="old('name')" required autofocus autocomplete="given-name" />
                </div>
                
                <div>
                    <x-label for="apellidos" value="{{ __('Apellidos') }}" class="text-gray-900 fw-bold"/>
                    <x-input id="apellidos" class="block mt-1 w-full border-gray-700" type="text" name="apellidos" :value="old('apellidos')" required autocomplete="family-name" />
                </div>
            </div>

            <div class="mt-4">
                <x-label for="email" value="{{ __('Correo Electrónico') }}" class="text-gray-900 fw-bold"/>
                <x-input id="email" class="block mt-1 w-full border-gray-700" type="email" name="email" :value="old('email')" required autocomplete="username" />
            </div>

            <div class="mt-4">
                <x-label for="password" value="{{ __('Contraseña') }}" class="text-gray-900 fw-bold"/>
                <x-input id="password" class="block mt-1 w-full border-gray-700" type="password" name="password" required autocomplete="new-password" />
            </div>

            <div class="mt-4">
                <x-label for="password_confirmation" value="{{ __('Confirmar Contraseña') }}" class="text-gray-900 fw-bold"/>
                <x-input id="password_confirmation" class="block mt-1 w-full border-gray-700" type="password" name="password_confirmation" required autocomplete="new-password" />
            </div>

            @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                <div class="mt-4">
                    <x-label for="terms">
                        <div class="flex items-center">
                            <x-checkbox name="terms" id="terms" required />
                            <div class="ms-2 text-gray-700">
                                {!! __('Acepto los :terms_of_service y :privacy_policy', [
                                        'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'" class="underline hover:text-gray-900">'.__('Términos del servicio').'</a>',
                                        'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'" class="underline hover:text-gray-900">'.__('Política de privacidad').'</a>',
                                ]) !!}
                            </div>
                        </div>
                    </x-label>
                </div>
            @endif

            <div class="flex items-center justify-between mt-6">
                <a href="{{ url()->previous() }}" class="underline text-sm text-gray-700 hover:text-gray-900">
                    {{ __('← Atrás') }}
                </a>

                <x-button class="bg-gray-900 hover:bg-gray-800 text-white">
                    {{ __('Crear Cuenta') }}
                </x-button>
            </div>

            <div class="mt-4 text-center p-3 bg-gray-100 rounded-lg">
                <p class="text-sm text-gray-700">
                    ¿Ya tienes cuenta? 
                    <a href="{{ route('login') }}" class="font-bold text-gray-900 hover:underline">
                        Iniciar sesión aquí
                    </a>
                </p>
            </div>
        </form>
    </x-authentication-card>
</x-guest-layout>

<style>
/* Fuente y colores de GoSports */
body, input, button, select, textarea { font-family: 'Roboto', sans-serif; }
.fw-bold { font-weight: 700; }
.border-gray-700 { border-color: #4a4a4a; }
.text-gray-900 { color: #111111; }
.text-gray-700 { color: #333333; }
.bg-gray-100 { background-color: #f5f5f5; }
.bg-gray-900 { background-color: #111111; }
.hover\:bg-gray-800:hover { background-color: #1a1a1a; }
.hover\:text-gray-900:hover { color: #111111; }
</style>
