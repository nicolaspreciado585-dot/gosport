<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CanchasSeeder extends Seeder
{
    public function run()
    {
        // Limpia la tabla sin truncar (para evitar problemas con FK)
        DB::table('canchas')->delete();

        // Inserta los datos
        DB::table('canchas')->insert([
            [
                'nombre' => 'Cancha Sintética Bosa Centro',
                'capacidad' => 22,
                'precio_hora' => 50000,
                'estado' => 'disponible',
                'reservada' => false,
                'foto' => 'imagenes/Canchabosa1.jpeg',
                'id_tipo_cancha' => 1,
                'id_direccion' => 1,
                'id_deporte' => 1,
                'id_admin_cancha' => 1,
            ],
            [
                'nombre' => 'Polideportivo Bosa Porvenir',
                'capacidad' => 22,
                'precio_hora' => 45000,
                'estado' => 'mantenimiento',
                'reservada' => true,
                'foto' => 'imagenes/Canchabosa2.jpeg',
                'id_tipo_cancha' => 1,
                'id_direccion' => 2,
                'id_deporte' => 1,
                'id_admin_cancha' => 1,
            ],
            [
                'nombre' => 'Cancha Fútbol 11 Bosa Recreo',
                'capacidad' => 22,
                'precio_hora' => 48000,
                'estado' => 'disponible',
                'reservada' => false,
                'foto' => 'imagenes/Canchabosa3.jpeg',
                'id_tipo_cancha' => 1,
                'id_direccion' => 3,
                'id_deporte' => 1,
                'id_admin_cancha' => 1,
            ],
            [
                'nombre' => 'Cancha Tenis Bosa La Estación',
                'capacidad' => 4,
                'precio_hora' => 30000,
                'estado' => 'disponible',
                'reservada' => false,
                'foto' => 'imagenes/Tenisbosa1.jpeg',
                'id_tipo_cancha' => 2,
                'id_direccion' => 4,
                'id_deporte' => 2,
                'id_admin_cancha' => 1,
            ],
            [
                'nombre' => 'Cancha Basket Parque Clarelandia',
                'capacidad' => 10,
                'precio_hora' => 35000,
                'estado' => 'disponible',
                'reservada' => false,
                'foto' => 'imagenes/Basket1.jpeg',
                'id_tipo_cancha' => 3,
                'id_direccion' => 5,
                'id_deporte' => 3,
                'id_admin_cancha' => 1,
            ],
            [
                'nombre' => 'Cancha Basket Parque Tibanica',
                'capacidad' => 10,
                'precio_hora' => 35000,
                'estado' => 'mantenimiento',
                'reservada' => true,
                'foto' => 'imagenes/Tibanica.jpeg',
                'id_tipo_cancha' => 3,
                'id_direccion' => 6,
                'id_deporte' => 3,
                'id_admin_cancha' => 1,
            ],
            [
                'nombre' => 'Cancha Basket Parque El Porvenir',
                'capacidad' => 10,
                'precio_hora' => 35000,
                'estado' => 'disponible',
                'reservada' => false,
                'foto' => 'imagenes/elporvenir.jpeg',
                'id_tipo_cancha' => 3,
                'id_direccion' => 7,
                'id_deporte' => 3,
                'id_admin_cancha' => 1,
            ],
        ]);
    }
}
