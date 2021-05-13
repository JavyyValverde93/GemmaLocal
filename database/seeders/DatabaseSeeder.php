<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UserSeeder::class);
        \App\Models\User::factory(111)->create();
        \App\Models\Alumno::factory(50)->create();
        // \App\Models\Profesor::factory(25)->create();
        \App\Models\Categoria::factory(9)->create();
        // \App\Models\Actividad::factory(10)->create();
        \App\Models\Espacio::factory(10)->create();
    }
}
