<?php

namespace Database\Factories;

use App\Models\Espacio;
use Illuminate\Database\Eloquent\Factories\Factory;

class EspacioFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Espacio::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nombre' => "Actividad ".$this->faker->lastName(),
            'capacidad' => $this->faker->numberBetween(15, 30),
            'planta' => $this->faker->numberBetween(-1, 3),
            'turno' => "mañana",
            'fecha_creacion' => now()->getTimestamp(),
            'fecha_modificacion' => now()->getTimestamp()
        ];
    }
}
