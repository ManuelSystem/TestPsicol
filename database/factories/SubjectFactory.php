<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Subject>
 */
class SubjectFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => $this->faker->word,
            'area' => $this->faker->word,
            'description' => $this->faker->sentence,
            'subject_credits' => $this->faker->randomDigitNotNull,
            'elective' => $this->faker->boolean,
        ];
    }
}
