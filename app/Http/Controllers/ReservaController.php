<?php

namespace App\Http\Controllers;

use App\Models\Cancha;
use Illuminate\Http\Request;

class ReservaController extends Controller
{
    // Formulario vacío
    public function createEmpty()
    {
        return view('reservas.create');
    }

    // Formulario con cancha seleccionada
    public function create($id_cancha)
    {
        $cancha = Cancha::findOrFail($id_cancha);
        return view('reservas.create', compact('cancha'));
    }
}

