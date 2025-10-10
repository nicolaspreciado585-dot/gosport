<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reserva;
use App\Models\Cancha;
use Illuminate\Support\Facades\Auth;

class ReservaController extends Controller
{
    /**
     * 📜 Mostrar historial de reservas del usuario autenticado
     */
    public function index(Request $request)
    {
        $query = Reserva::where('id_cliente', Auth::id())->with('cancha');

        // Filtro por estado
        if ($request->filled('estado')) {
            $query->where('estado', $request->estado);
        }

        // Paginación y orden (👈 corregido)
        $reservas = $query->orderBy('fecha_inicio', 'desc')->paginate(10);

        return view('Reservas.historial', compact('reservas'));
    }

    /**
     * 🆕 Mostrar formulario para crear una nueva reserva (sin cancha seleccionada)
     */
    public function createEmpty()
    {
        $canchas = Cancha::all();
        return view('Reservas.create', compact('canchas'));
    }

    /**
     * 🆕 Mostrar formulario para crear una reserva con una cancha específica
     */
    public function create($id_cancha)
    {
        $cancha = Cancha::findOrFail($id_cancha);
        return view('Reservas.create', compact('cancha'));
    }

    /**
     * 💾 Guardar nueva reserva
     */
    public function store(Request $request)
{
    $request->validate([
        'id_cancha' => 'required|exists:canchas,id_cancha',
        'fecha' => 'required|date',
        'hora_inicio' => 'required',
        'hora_fin' => 'required|after:hora_inicio',
    ]);

    //validador para no superar las 23:59   
    if ($request->hora_fin > '23:59'){
        return back()->withErrors(['hora_fin' => 'La hora de fin no puede pasar de las 11:59 p.m.'])
                     ->withInput();
    }

    Reserva::create([
        'id_cliente' => Auth::id(),
        'id_cancha' => $request->id_cancha,
        'fecha_inicio' => $request->fecha . ' ' . $request->hora_inicio,
        'fecha_fin' => $request->fecha . ' ' . $request->hora_fin,
        'estado' => 'pendiente',
    ]);

        return redirect()->route('reservas.historial')->with('success', 'Reserva creada exitosamente');
    }

    /**
     * ✏️ Mostrar formulario para editar una reserva existente
     */
    public function edit($id)
    {
        $reserva = Reserva::where('id_reserva', $id)
            ->where('id_cliente', Auth::id())
            ->firstOrFail();

        $canchas = Cancha::all();

        return view('Reservas.edit', compact('reserva', 'canchas'));
    }

    /**
     * 🔄 Actualizar los datos de una reserva
     */
    public function update(Request $request, $id)
    {
        $reserva = Reserva::where('id_reserva', $id)
            ->where('id_cliente', Auth::id())
            ->firstOrFail();

        $validated = $request->validate([
            'id_cancha' => 'required|exists:canchas,id_cancha',
            'fecha_inicio' => 'required|date',
            'fecha_fin' => 'required|date|after:fecha_inicio',
            'estado' => 'required|in:pendiente,confirmada,cancelada',
        ]);

        $reserva->update($validated);

        return redirect()->route('reservas.historial')->with('success', 'Reserva actualizada correctamente.');
    }

    /**
     * ❌ Eliminar una reserva
     */
    public function destroy($id)
    {
        $reserva = Reserva::where('id_reserva', $id)
            ->where('id_cliente', Auth::id())
            ->firstOrFail();

        $reserva->delete();

        return redirect()->route('reservas.historial')->with('success', 'Reserva eliminada correctamente.');
    }
}
