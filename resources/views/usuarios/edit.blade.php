<x-app-layout>
    <x-slot name="header"><br>
    <br>
        <div class="flex items-center gap-4">
        <!-- Logo -->
        <img src="{{ asset('imagenes/Logo_Gosport.jpeg') }}" alt="Logo" class="h-12 rounded">

        <!-- Título -->
        <h2 class="font-semibold text-xl text-white leading-tight">
            {{ __('Editar usuario') }}
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
                            <form action="{{ route('usuarios.update', $usuario) }}" method="POST" class="space-y-6">
                                @csrf
                                @method('PUT')

                                {{-- Nombre --}}
                                <div>
                                    <label for="nombre" class="block font-medium">Nombre</label>
                                    <input type="text" name="nombre" id="nombre"
                                        value="{{ old('nombre', $usuario->nombre) }}"
                                        class="w-full border rounded px-3 py-2">
                                </div>

                                {{-- Correo --}}
                                <div>
                                    <label for="correo" class="block font-medium">Correo</label>
                                    <input type="email" name="correo" id="correo"
                                        value="{{ old('correo', $usuario->correo) }}"
                                        class="w-full border rounded px-3 py-2">
                                </div>

                                {{-- Teléfono --}}
                                <div>
                                    <label for="telefono" class="block font-medium">Teléfono</label>
                                    <input type="text" name="telefono" id="telefono" maxlength="10"
                                        value="{{ old('telefono', $usuario->telefono) }}"
                                        class="w-full border rounded px-3 py-2">
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
