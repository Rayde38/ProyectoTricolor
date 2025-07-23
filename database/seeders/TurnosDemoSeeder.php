<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Turno;
use App\Models\Chofer;

class TurnosDemoSeeder extends Seeder
{
    public function run(): void
    {
        $chofer = Chofer::first();
        if ($chofer) {
            Turno::firstOrCreate([
                'chofer_id' => $chofer->id,
                'fecha' => now()->toDateString(),
            ], [
                'estado' => 'pendiente',
            ]);
        }
    }
}
