<?php

namespace Database\Seeders;
use App\Models\Rolespermiso;
use App\Models\Permiso;

use Illuminate\Database\Seeder;

class RolespermisoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permisos = Permiso::count();
        for($i=1; $i<=$permisos; $i++){
            Rolespermiso::create([
                'id_rol' => 1,
                'id_permiso' => $i
            ]);
        }
    }
}
