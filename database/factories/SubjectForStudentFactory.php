<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\SubjectForStudent>
 */
class SubjectForStudentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'student_id' => $this->faker->numberBetween(1,6),
            'teacher_id' => $this->faker->numberBetween(1,6),
            'subject_id' => $this->faker->numberBetween(1,6),
        ];
    }
}
