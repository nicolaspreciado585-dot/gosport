<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactoController extends Controller
{
    public function index()
    {
        return view('contacto.index');
    }

    public function store(Request $request)
    {
        // Validar datos
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'message' => 'required|string|min:5',
        ]);

        // Aquí podrías guardar en BD o enviar correo
        // Contacto::create($request->all());

        return back()->with('success', 'Tu mensaje fue enviado correctamente.');
}
}
