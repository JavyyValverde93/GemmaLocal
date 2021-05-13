<?php

namespace Database\Factories;

use App\Models\Actividad;
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
        return [
            'id_profesor' => $this->faker->unique()->numberBetween(2, 20),
            'id_grupo' => $this->faker->unique()->numberBetween(2, 20),
            'id_categoria' => $this->faker->numberBetween(0, 8),
            'nombre' => $this->faker->lastName(),
            'descripcion' => $this->faker->text(20),
            'horas' => $this->faker->numberBetween(2, 10),
            'anio_academico' => "2021/2022",
            'fecha_creacion' => now()->getTimestamp(),
            'fecha_modificacion' => now()->getTimestamp()
        ];
    }
}
