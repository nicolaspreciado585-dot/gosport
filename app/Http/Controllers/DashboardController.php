<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cancha;

class DashboardController extends Controller
{
    public function index()
    {
        // Trae todas las canchas con sus relaciones cargadas
        $canchas = Cancha::with('direccion', 'deporte')->get();
        
        return view('dashboard', compact('canchas'));
    }
}
