@php
    // Para edición, $usuario llega definido; en creación es null.
    $val = fn($key, $default = '') => old($key, isset($usuario) ? ($usuario->{$key} ?? $default) : $default);
@endphp

<div class="space-y-4">

    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">

        {{-- Nombre --}}
        <div>
            <label class="block text-sm font-medium mb-1">Nombre *</label>
            <input type="text" name="nombre" value="{{ $val('nombre') }}"
                   class="w-full border rounded px-3 py-2" required>
            @error('nombre')<p class="text-red-600 text-sm mt-1">{{ $message }}</p>@enderror
        </div>

        {{-- Correo --}}
        <div>
            <label class="block text-sm font-medium mb-1">Correo *</label>
            <input type="email" name="correo" value="{{ $val('correo') }}"
                   class="w-full border rounded px-3 py-2" required>
            @error('correo')<p class="text-red-600 text-sm mt-1">{{ $message }}</p>@enderror
        </div>

        {{-- Teléfono --}}
        <div>
            <label class="block text-sm font-medium mb-1">Teléfono</label>
            <input type="text" name="telefono" value="{{ $val('telefono') }}"
                   class="w-full border rounded px-3 py-2">
            @error('telefono')<p class="text-red-600 text-sm mt-1">{{ $message }}</p>@enderror
        </div>

    </div>
</div>
