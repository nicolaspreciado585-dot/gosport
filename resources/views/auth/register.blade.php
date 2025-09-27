<x-guest-layout>
    <x-authentication-card>
        <x-slot name="logo">
            <x-authentication-card-logo />
        </x-slot>

        <x-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div>
                <x-label for="name" value="{{ __('Nombre') }}" class="text-black fw-bold"/>
                <x-input id="name" class="block mt-1 w-full border-gray-700" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            </div>

            <div class="mt-4">
                <x-label for="email" value="{{ __('Correo Electrónico') }}" class="text-black fw-bold"/>
                <x-input id="email" class="block mt-1 w-full border-gray-700" type="email" name="email" :value="old('email')" required autocomplete="username" />
            </div>

            <div class="mt-4">
                <x-label for="password" value="{{ __('Contraseña') }}" class="text-black fw-bold"/>
                <x-input id="password" class="block mt-1 w-full border-gray-700" type="password" name="password" required autocomplete="new-password" />
            </div>

            <div class="mt-4">
                <x-label for="password_confirmation" value="{{ __('Confirmar Contraseña') }}" class="text-black fw-bold"/>
                <x-input id="password_confirmation" class="block mt-1 w-full border-gray-700" type="password" name="password_confirmation" required autocomplete="new-password" />
            </div>

            @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                <div class="mt-4">
                    <x-label for="terms" class="text-black fw-bold">
                        <div class="flex items-center">
                            <x-checkbox name="terms" id="terms" required />
                            <div class="ms-2">
                                {!! __('Acepto los :terms_of_service y :privacy_policy', [
                                        'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'" class="underline text-black hover:text-gray-800">'.__('Términos del servicio').'</a>',
                                        'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'" class="underline text-black hover:text-gray-800">'.__('Política de privacidad').'</a>',
                                ]) !!}
                            </div>
                        </div>
                    </x-label>
                </div>
            @endif

            <div class="flex items-center justify-between mt-4">
                <a href="javascript:history.back()" class="btn-back px-4 py-2 rounded text-white bg-gray-800 hover:bg-gray-900">Atrás</a>

                <x-button class="ms-4 bg-black hover:bg-gray-800 text-white">
                    {{ __('Registrarse') }}
                </x-button>
            </div>
        </form>
    </x-authentication-card>
</x-guest-layout>

<style>
.btn-back { font-weight: 700; }
body, input, button { font-family: 'Roboto', sans-serif; }
</style>
