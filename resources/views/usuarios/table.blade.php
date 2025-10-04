<x-app-layout>
<x-slot name="header">
    <div class="flex items-center gap-4">
        <img src="{{ asset('imagenes/Logo_Gosport.jpeg') }}" id="img" alt="Logo" class="h-12">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Usuarios') }}
        </h2>
    </div>
</x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div style="padding:16px">

                    <p>
                        <a href="{{ route('usuarios.create') }}">➕ Nuevo Usuario</a>
                    </p>

                    @if (session('ok'))
                        <p style="color:green">{{ session('ok') }}</p>
                    @endif

                    <table id="usuarios" class="display" style="width:100%">
                        <thead>
                            <tr>
                                <th>Nombre</th>
                                <th>Correo</th>
                                <th>Teléfono</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($usuarios as $e)
                                <tr>
                                    <td>{{ $e->nombre }}</td>
                                    <td>{{ $e->correo }}</td>
                                    <td>{{ $e->telefono }}</td>
                                    <td>
                                        <a href="{{ route('usuarios.edit', $e) }}">✏️ Editar</a>
                                        <form action="{{ route('usuarios.destroy', $e) }}" 
                                              method="POST" 
                                              style="display:inline" 
                                              onsubmit="return confirm('¿Eliminar este usuario?')">
                                            @csrf 
                                            @method('DELETE')
                                            <button type="submit">🗑️ Eliminar</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>

    {{-- jQuery + DataTables (CDN) --}}
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.8/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.4.2/css/buttons.dataTables.min.css">
    
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.8/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.2/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.print.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>


    <script>
        $(function() {
            $('#usuarios').DataTable({
                pageLength: 20,
                dom: 'Bfrtip',
                language: {
                    url: 'https://cdn.datatables.net/plug-ins/1.13.8/i18n/es-ES.json'
                },
                buttons: ['copy', 'csv', 'excel', 'pdf', 'print']
            });
        });
    </script>


<style>
    body {
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
    }

    .text-gray-800 {
        color: #fff !important;
    }
</style>

</x-app-layout>
