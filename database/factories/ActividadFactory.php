<?php

namespace Database\Factories;

use App\Models\Actividad;
use App\Models\Grupo;
use Illuminate\Database\Eloquent\Factories\Factory;

class ActividadFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Actividad::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $rand = $this->faker->unique()->numberBetween(1, 21);
        $id_profesor = Grupo::where('id', $rand)->first()->id_profesor;
        return [
            'id_profesor' => $id_profesor,
            'id_grupo' => $rand,
            'id_categoria' => $this->faker->numberBetween(1, 8),
            'nombre' => "Actividad ".$this->faker->numberBetween(1, 20),
            'descripcion' => $this->faker->text(20),
            'horas' => $this->faker->numberBetween(2, 10),
            'anio_academico' => "2021/2022",
            'fecha_creacion' => now()->getTimestamp(),
            'fecha_modificacion' => now()->getTimestamp()
        ];
    }
}
