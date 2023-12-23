<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Student>
 */
class StudentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $semesters = ['Primero', 'Segundo', 'Tercero', 'Cuarto', 'Quinto', 'Sexto', 'Septimo', 'Octavo', 'Noveno', 'Décimo'];

        return [
            'document' => $this->faker->numerify('########'),
            'name' => $this->faker->name,
            'phone' => $this->faker->e164PhoneNumber(),
            'email' => $this->faker->email,
            'address' => $this->faker->address,
            'city'  => $this->faker->city,
            'semester' => $this->faker->randomElement($semesters),
        ];
    }
}
