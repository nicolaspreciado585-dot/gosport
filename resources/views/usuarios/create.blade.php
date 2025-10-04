    <x-app-layout>
<x-slot name="header"><br>
    <br>
    <div class="flex items-center gap-4">
        <!-- Logo -->
        <img src="{{ asset('imagenes/Logo_Gosport.jpeg') }}" alt="Logo" class="h-12 rounded">

        <!-- Título -->
        <h2 class="font-semibold text-xl text-white leading-tight">
            {{ __('Crear usuario') }}
        </h2>
    </div>
</x-slot>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <div class="py-8">
                        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
                            <div class="bg-white p-6 shadow sm:rounded-lg">

                                {{-- FORMULARIO --}}
                                <form action="{{ route('usuarios.store') }}" method="POST" class="space-y-6">
                                    @csrf

                                    {{-- Nombre --}}
                                    <div>
                                        <label for="nombre" class="block font-medium">Nombre</label>
                                        <input type="text" name="nombre" id="nombre" 
                                            value="{{ old('nombre') }}"
                                            class="w-full border rounded px-3 py-2">
                                        @error('nombre')
                                            <span class="text-red-600 text-sm">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    {{-- Correo --}}
                                    <div>
                                        <label for="correo" class="block font-medium">Correo</label>
                                        <input type="email" name="correo" id="correo" 
                                            value="{{ old('correo') }}"
                                            class="w-full border rounded px-3 py-2">
                                        @error('correo')
                                            <span class="text-red-600 text-sm">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    {{-- Contraseña --}}
                                    <div>
                                        <label for="contraseña" class="block font-medium">Contraseña</label>
                                        <input type="password" name="contraseña" id="contraseña" 
                                            class="w-full border rounded px-3 py-2">
                                        @error('contraseña')
                                            <span class="text-red-600 text-sm">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    {{-- Teléfono --}}
                                    <div>
                                        <label for="telefono" class="block font-medium">Teléfono</label>
                                        <input type="text" name="telefono" maxlength="10" pattern="[0-9]{6,10}" id="telefono" 
                                            value="{{ old('telefono') }}"
                                            class="w-full border rounded px-3 py-2">
                                        @error('telefono')
                                            <span class="text-red-600 text-sm">{{ $message }}</span>
                                            @enderror
                                        </div>


                                    {{-- BOTONES --}}
                                    <div class="pt-4 flex gap-3">                                    
                                        <button type="submit" 
                                            class="px-4 py-2 border rounded bg-gray-400 text-white hover:bg-gray-500">
                                            Guardar
                                        </button>

                                        <a href="{{ route('usuarios.index') }}"
                                            class="px-4 py-2 border rounded bg-gray-400 text-white hover:bg-gray-500">
                                            Cancelar
                                        </a>
                                    </div>
                                </form>
                                {{-- FIN FORMULARIO --}}

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <style>
    body .input {
        background-color: #32373dff !important; /* negro absoluto */
        color: white; /* texto blanco para contraste */
    }
    
    img{
        width: 50px;
        height: 50px;
    }
    /* Opcional: Cambiar fondo de los contenedores a negro */
    .bg-white {
        background-color: #32373dff !important;
        color: white;
    }
    input{
        color: black;
    }

    .text-gray-800 {
        color: #fff !important;
    }
</style>
    </x-app-layout>
