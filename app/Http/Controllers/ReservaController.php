<?php

namespace App\Http\Controllers;

use App\Models\Reserva;
use App\Models\Cancha;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReservaController extends Controller
{
    public function create($id_cancha)
    {
        $cancha = Cancha::findOrFail($id_cancha);
        return view('reservas.create', compact('cancha'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_cancha' => 'required|exists:canchas,id_cancha',
            'fecha_reserva' => 'required|date',
            'hora_inicio' => 'required|date_format:H:i',
            'fecha_fin' => 'required|date|after_or_equal:fecha_reserva',
        ]);

        Reserva::create([
            'id_usuario' => Auth::id(),
            'id_cancha' => $request->id_cancha,
            'fecha_reserva' => $request->fecha_reserva,
            'hora_inicio' => $request->hora_inicio,
            'fecha_fin' => $request->fecha_fin,
            'estado' => 'pendiente',
        ]);

        return redirect()->route('dashboard')->with('success', 'Reserva realizada con éxito');
    }
}
