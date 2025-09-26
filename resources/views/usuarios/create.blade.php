<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Crear nuevo usuario') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
                <form action="{{ route('usuarios.store') }}" method="POST">
                    @csrf
                    
                    <div class="mb-4">
                        <label for="nombres" class="block text-gray-700 text-sm font-bold mb-2">Nombres:</label>
                        <input type="text" id="nombres" name="nombres" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                    </div>

                    <div class="mb-4">
                        <label for="apellidos" class="block text-gray-700 text-sm font-bold mb-2">Apellidos:</label>
                        <input type="text" id="apellidos" name="apellidos" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                    </div>

                    <div class="mb-4">
                        <label for="tipo_documento" class="block text-gray-700 text-sm font-bold mb-2">Tipo de documento:</label>
                        <select id="tipo_documento" name="tipo_documento" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                            <option value="">Selecciona un tipo de documento</option>
                            <option value="cc">Cédula de Ciudadanía</option>
                            <option value="ti">Tarjeta de Identidad</option>
                            <option value="ce">Cédula de Extranjería</option>
                        </select>
                    </div>

                    <div class="mb-4">
                        <label for="numero_documento" class="block text-gray-700 text-sm font-bold mb-2">Número de documento:</label>
                        <input type="text" id="numero_documento" name="numero_documento" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                    </div>
                    
                    <div class="mb-4">
                        <label for="tipo_sangre" class="block text-gray-700 text-sm font-bold mb-2">Tipo de sangre:</label>
                        <select id="tipo_sangre" name="tipo_sangre" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                            <option value="">Selecciona un tipo de sangre</option>
                            <option value="A+">A+</option>
                            <option value="A-">A-</option>
                            <option value="B+">B+</option>
                            <option value="B-">B-</option>
                            <option value="AB+">AB+</option>
                            <option value="AB-">AB-</option>
                            <option value="O+">O+</option>
                            <option value="O-">O-</option>
                        </select>
                    </div>

                    <div class="mb-4">
                        <label for="correo" class="block text-gray-700 text-sm font-bold mb-2">Correo electrónico:</label>
                        <input type="email" id="correo" name="correo" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                    </div>

                    <div class="mb-4">
                        <label for="direccion" class="block text-gray-700 text-sm font-bold mb-2">Dirección:</label>
                        <input type="text" id="direccion" name="direccion" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                    </div>

                    <div class="mb-4">
                        <label for="telefono" class="block text-gray-700 text-sm font-bold mb-2">Teléfono:</label>
                        <input type="tel" id="telefono" name="telefono" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                    </div>
                    
                    <div class="flex items-center justify-end mt-4">
                        <button type="submit" class="bg-green-500 hover:bg-green-700 text-black font-bold py-2 px-4 rounded">
                            Guardar
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>