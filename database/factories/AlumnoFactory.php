<?php

namespace Database\Factories;

use App\Models\Alumno;
use Illuminate\Database\Eloquent\Factories\Factory;

class AlumnoFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Alumno::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'id_usuario'=> $this->faker->unique()->numberBetween(5, 80),
            'nombre'=> $this->faker->firstName(),
            'apellidos'=> $this->faker->lastName(),
            'dni'=> $this->faker->dni(),
            'domicilio' => $this->faker->address(),
            'poblacion' => $this->faker->city(),
            'provincia' => $this->faker->city(),
            'pais' => $this->faker->country(),
            'codigo_postal' => $this->faker->postcode(),
            'sexo' => $this->faker->randomElement($array = array ('male', 'female')),
            'telefono' => $this->faker->phoneNumber(),
            'email' => $this->faker->unique()->safeEmail(),
            'edad' => $this->faker->numberBetween(6, 40),
            'fecha_nacimiento' => now()->getTimestamp(),
            'lugar_nacimiento' => $this->faker->city(),
            'nss' => 49030050600,
            'fecha_creacion' => now()->getTimestamp(),
            'observaciones' => $this->faker->text()
        ];
    }
}
