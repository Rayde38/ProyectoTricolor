<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\Usuario;

class UsuariosDemoSeeder extends Seeder
{
    public function run(): void
    {
        $usuarios = [
            [
                'nombre' => 'Admin Demo',
                'email' => 'admin@demo.com',
                'password' => Hash::make('admin123'),
                'rol' => 'admin',
                'estado' => 'activo',
            ],
            [
                'nombre' => 'Secretaria Demo',
                'email' => 'secretaria@demo.com',
                'password' => Hash::make('secretaria123'),
                'rol' => 'secretaria',
                'estado' => 'activo',
            ],
            [
                'nombre' => 'Chofer Demo',
                'email' => 'chofer@demo.com',
                'password' => Hash::make('chofer123'),
                'rol' => 'chofer',
                'estado' => 'activo',
            ],
            [
                'nombre' => 'Pasajero Demo',
                'email' => 'pasajero@demo.com',
                'password' => Hash::make('pasajero123'),
                'rol' => 'pasajero',
                'estado' => 'activo',
            ],
        ];
        foreach ($usuarios as $data) {
            Usuario::firstOrCreate(['email' => $data['email']], $data);
        }
    }
}
