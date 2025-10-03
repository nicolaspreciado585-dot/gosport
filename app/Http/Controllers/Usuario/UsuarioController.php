<?php

namespace App\Http\Controllers\Usuario;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Usuario;
use App\Models\Rol;
use App\Models\Cancha;
use Illuminate\Support\Facades\Hash;

class UsuarioController extends Controller
{
    /**
     * Muestra una lista de los usuarios.
     */
    public function index()
    {
        $usuarios = Usuario::with('rol')
            ->orderBy('id_usuario')
            ->get();

        return view('usuarios.table', compact('usuarios'));
    }

    /**
     * Muestra el formulario para crear un nuevo usuario.
     */
    public function create()
    {
        return view('usuarios.create', [
            'rol' => rol::orderBy('nombre_rol')->get(['id_rol','nombre_rol'])
        ]);
    }

    public function show(Usuario $usuario)
    {
    return view('usuarios.show', compact('usuario'));
    }
    /**
     * Guarda un nuevo usuario en la base de datos.
     */
public function store(Request $request)
{
    $request->validate([
        'nombre' => 'required|string|max:100',
        'correo' => 'required|email|unique:usuarios,correo',
        'contraseña' => 'required|string|min:6',
        'telefono' => 'nullable|string|max:10',
    ]);

    Usuario::create([
        'nombre' => $request->nombre,
        'correo' => $request->correo,
        'contraseña' => Hash::make($request->contraseña), // encriptamos
        'telefono' => $request->telefono,
    ]);

    return redirect()->route('usuarios.index')->with('ok', 'Usuario creado correctamente.');
}


    /**
     * Muestra el formulario de edición de un usuario.
     */
    public function edit(Usuario $usuario)
    {
        return view('usuarios.edit', [
            'usuario' => $usuario,
            'rol' => rol::orderBy('nombre_rol')->get(['id_rol','nombre_rol'])
        ]);
    }

    /**
     * Actualiza un usuario en la base de datos.
     */
public function update(Request $request, Usuario $usuario)
{
     $request->validate([
        'nombre' => 'required|string|max:100',
        'correo' => 'required|email|unique:usuarios,correo,' . $usuario->id_usuario . ',id_usuario',
        'telefono' => 'nullable|string|max:10',
    ]);

    $usuario->update([
        'nombre' => $request->nombre,
        'correo' => $request->correo,
        'telefono' => $request->telefono,
    ]);

    return redirect()->route('usuarios.index')->with('ok', 'Usuario actualizado exitosamente.');
}


    /**
     * Elimina un usuario de la base de datos.
     */
    public function destroy(Usuario $usuario)
    {
        try {
            $usuario->delete();
            return back()->with('ok','Usuario eliminado correctamente.');
        } catch (\Throwable $e) {
            return back()->withErrors('No se puede eliminar: tiene registros relacionados.');
        }
    }
}
