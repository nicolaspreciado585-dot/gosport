<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reserva;
use App\Models\Cancha;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class ReservaController extends Controller
{
    // Mostrar historial de reservas del usuario con filtro y paginación (últimos 2 meses)
    public function index(Request $request) {
        $fechaLimite = Carbon::now()->subMonths(2);

        $query = Reserva::where('id_cliente', Auth::id())
            ->where('fecha_inicio', '>=', $fechaLimite)
            ->with('cancha');

        // Filtro por estado (pendiente, confirmada, cancelada)
        if ($request->filled('estado')) {
            $query->where('estado', $request->estado);
        }

        // Ordenar por fecha más reciente
        $reservas = $query->orderBy('fecha_inicio', 'desc')->paginate(10);

        return view('reservas.historial', compact('reservas'));
    }

    // Mostrar formulario vacío para nueva reserva
    public function createEmpty() {
        $canchas = Cancha::all();
        return view('reservas.create', compact('canchas'));
    }

    // Mostrar formulario de reserva para una cancha específica
    public function create($id_cancha) {
        $cancha = Cancha::findOrFail($id_cancha);
        return view('reservas.create', compact('cancha'));
    }

    // Guardar nueva reserva
    public function store(Request $request) {
        $request->validate([
            'id_cancha' => 'required|exists:canchas,id_cancha',
            'fecha_inicio' => 'required|date',
            'fecha_fin' => 'required|date|after:fecha_inicio',
        ]);

        Reserva::create([
            'id_cliente' => Auth::id(),
            'id_cancha' => $request->id_cancha,
            'fecha_inicio' => $request->fecha_inicio,
            'fecha_fin' => $request->fecha_fin,
            'estado' => 'pendiente',
        ]);

        return redirect()->route('reservas.historial')->with('success', 'Reserva creada correctamente.');
    }

    // Mostrar formulario para editar reserva
    public function edit(Reserva $reserva) {
        $canchas = Cancha::all();
        return view('reservas.edit', compact('reserva', 'canchas'));
    }

    // Actualizar reserva
    public function update(Request $request, Reserva $reserva) {
        $validated = $request->validate([
            'id_cancha' => 'required|exists:canchas,id_cancha',
            'fecha_inicio' => 'required|date',
            'fecha_fin' => 'required|date|after:fecha_inicio',
            'estado' => 'nullable|in:pendiente,confirmada,cancelada',
        ]);

        $reserva->update($validated);

        return redirect()->route('reservas.historial')->with('success', 'Reserva actualizada correctamente.');
    }

    // Eliminar reserva
    public function destroy(Reserva $reserva) {
        $reserva->delete();
        return redirect()->route('reservas.historial')->with('success', 'Reserva eliminada correctamente.');
    }
}
