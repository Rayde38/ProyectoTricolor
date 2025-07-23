<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Pasajero;
use App\Models\Usuario;

class PasajerosDemoSeeder extends Seeder
{
    public function run(): void
    {
        $usuario = Usuario::where('rol', 'pasajero')->first();
        if ($usuario) {
            Pasajero::firstOrCreate([
                'telefono' => '777333444',
                'uid' => 'UIDPASAJERO1',
            ], [
                'nombre' => 'María',
                'apellido' => 'Gómez',
                'estado' => 'activo',
                'usuario_id' => $usuario->id,
            ]);
        }
    }
}
