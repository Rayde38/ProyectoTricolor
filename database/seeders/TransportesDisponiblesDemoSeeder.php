<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\TransporteDisponible;
use App\Models\Chofer;

class TransportesDisponiblesDemoSeeder extends Seeder
{
    public function run(): void
    {
        $chofer = Chofer::first();
        if ($chofer) {
            TransporteDisponible::firstOrCreate([
                'chofer_id' => $chofer->id,
                'parada' => 'Parada Central',
            ], [
                'estado' => 'esperando',
                'hora_disponible' => now(),
            ]);
        }
    }
}
