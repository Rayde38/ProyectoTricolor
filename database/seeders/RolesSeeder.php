<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RolesSeeder extends Seeder
{
    public function run(): void
    {
        $roles = ['admin', 'secretaria', 'chofer', 'pasajero'];
        foreach ($roles as $role) {
            Role::firstOrCreate(['name' => $role]);
        }
    }
}
