<?php

namespace Database\Factories;

use App\Models\Grupo;
use Illuminate\Database\Eloquent\Factories\Factory;

class GrupoFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Grupo::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nombre' => "Grupo ".$this->faker->lastName(),
            'id_profesor' => $this->faker->unique()->numberBetween(2, 100),
            'id_espacio' => rand(1, 20),
            'fecha_creacion' => now()->getTimestamp(),
            'fecha_modificacion' => now()->getTimestamp(),
        ];
    }
}
