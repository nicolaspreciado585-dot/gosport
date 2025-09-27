<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactoController extends Controller
{
    public function enviar(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'apellido' => 'required|string|max:100',
            'telefono' => 'required|string|max:20',
            'email' => 'required|email|max:255',
            'mensaje' => 'required|string',
        ]);

        // Aquí puedes enviar correo o guardar en DB
        // Por ahora solo redirige con mensaje
        return redirect()->route('contacto.form')
                         ->with('success', 'Mensaje enviado correctamente.');
    }
}
