<?php

namespace Database\Seeders;

use App\Models\Rolespermiso;
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
        $this->call(PermisoSeeder::class);
        $this->call(RolSeeder::class);
        $this->call(RolespermisoSeeder::class);
        $this->call(UserSeeder::class);
        \App\Models\User::factory(111)->create();
        \App\Models\Alumno::factory(50)->create();
        \App\Models\Profesor::factory(125)->create();
        \App\Models\Categoria::factory(9)->create();
        \App\Models\Espacio::factory(21)->create();
        \App\Models\Grupo::factory(21)->create();
        \App\Models\Actividad::factory(6)->create();
    }
}
