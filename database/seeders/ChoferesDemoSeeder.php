<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Chofer;
use App\Models\Usuario;

class ChoferesDemoSeeder extends Seeder
{
    public function run(): void
    {
        $usuario = Usuario::where('rol', 'chofer')->first();
        if ($usuario) {
            Chofer::firstOrCreate([
                'telefono' => '777111222',
                'ci' => '1234567',
            ], [
                'nombre' => 'Juan',
                'apellido' => 'Pérez',
                'estado' => 'activo',
                'usuario_id' => $usuario->id,
            ]);
        }
    }
}
