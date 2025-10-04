<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsuariosSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('usuarios')->insert([
            ['nombre' => 'carlos ruiz', 'correo' => 'carlos@gmail.com', 'contraseña' => '12345', 'telefono' => '3011111111', 'id_rol' => 1],
            ['nombre' => 'laura mora', 'correo' => 'laura@gmail.com', 'contraseña' => '12345', 'telefono' => '3022222222', 'id_rol' => 2],
            ['nombre' => 'daniel torres', 'correo' => 'daniel@gmail.com', 'contraseña' => '12345', 'telefono' => '3033333333', 'id_rol' => 3],
            ['nombre' => 'alejandra mesa', 'correo' => 'alejandra@gmail.com', 'contraseña' => '12345', 'telefono' => '3044444444', 'id_rol' => 1],
            ['nombre' => 'alejandro povera', 'correo' => 'alejan@gmail.com', 'contraseña' => '12345', 'telefono' => '3208573445', 'id_rol' => 2],
            ['nombre' => 'Felipe gutierra', 'correo' => 'felipegarzon@gmail.com', 'contraseña' => '12345', 'telefono' => '3155719255', 'id_rol' => 3],
            ['nombre' => 'juan viras', 'correo' => 'juanguatauva@gmail.com', 'contraseña' => '12345', 'telefono' => '3244604908', 'id_rol' => 3],
            ['nombre' => 'analia mendoza', 'correo' => 'analiamendez@gmail.com', 'contraseña' => '12345', 'telefono' => '3118795919', 'id_rol' => 1],
            ['nombre' => 'gustavo cerrati', 'correo' => 'cerconioviscons01@gmail.com', 'contraseña' => '12345', 'telefono' => '3521511211', 'id_rol' => 2],
            ['nombre' => 'vicente fernandez', 'correo' => 'davidgonzaleschente@gmail.com', 'contraseña' => '12345', 'telefono' => '3502244508', 'id_rol' => 3],
        ]);
    }
}