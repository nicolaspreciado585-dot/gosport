<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegistroController extends Controller
{
    public function index()
    {
        return view('registro');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'telefono' => 'required|numeric',
            'tipo_documento' => 'required|string',
            'numero_identificacion' => 'required|numeric|unique:users,numero_identificacion',
            'genero' => 'required|string',
            'password' => 'required|string|min:6|confirmed',
        ]);

        if ($validator->fails()) {
            return redirect()->route('registro')
                             ->withErrors($validator)
                             ->withInput();
        }

        User::create([
            'name' => $request->name,
            'telefono' => $request->telefono,
            'tipo_documento' => $request->tipo_documento,
            'numero_identificacion' => $request->numero_identificacion,
            'genero' => $request->genero,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('login')->with('success', 'Registro completado correctamente. ¡Ya puedes iniciar sesión!');
    }
}
