<?php

namespace Database\Seeders;
use App\Models\Rol;

use Illuminate\Database\Seeder;

class RolSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Rol::create([
            'nombre'=> 'administrador'
        ]);

        Rol::create([
            'nombre' => 'profesor'
        ]);

        Rol::create([
            'nombre' => 'alumno'
        ]);

        Rol::create([
            'nombre' => 'personal'
        ]);

    }
}
