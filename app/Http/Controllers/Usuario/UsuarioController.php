<?php

namespace App\Http\Controllers\Usuario;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash; // ¡Necesitas agregar esta línea!

class UsuarioController extends Controller
{
    /**
     * Muestra una lista de los usuarios.
     */
    public function index()
    {
        $usuarios = User::all();
        return view('usuarios.index', compact('usuarios'));
    }

    /**
     * Muestra el formulario para crear un nuevo usuario.
     */
    public function create()
    {
        return view('usuarios.create');
    }

    /**
     * Guarda un nuevo usuario en la base de datos.
     */
    public function store(Request $request)
    {
        // 1. Validación de los datos
        $request->validate([
            'nombres' => 'required|string|max:255',
            'apellidos' => 'required|string|max:255',
            'tipo_documento' => 'required|string',
            'numero_documento' => 'required|string|max:255',
            'tipo_sangre' => 'required|string',
            'correo' => 'required|string|email|max:255|unique:users,email',
            'direccion' => 'required|string|max:255',
            'telefono' => 'required|string|max:255',
        ]);

        // 2. Crear un nuevo registro
        $usuario = new User([
            'name' => $request->nombres,
            'apellidos' => $request->apellidos,
            'tipo_documento' => $request->tipo_documento,
            'numero_documento' => $request->numero_documento,
            'tipo_sangre' => $request->tipo_sangre,
            'email' => $request->correo,
            'direccion' => $request->direccion,
            'telefono' => $request->telefono,
            'password' => Hash::make('password'), // ¡Importante! Asigna una contraseña por defecto
        ]);

        $usuario->save();

        // 3. Redirigir a la vista principal de la tabla
        return redirect()->route('usuarios.index')->with('success', 'Usuario creado exitosamente.');
    }
}