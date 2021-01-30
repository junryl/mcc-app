<?php

namespace Database\Factories;

use App\Models\Grade;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class GradeFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Grade::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'course_id' => '1',
            'faculty_id' => '1',
            'midterm_grade' => $this->faker->numberBetween(1,100),
            'final_grade' => $this->faker->numberBetween(1,100),
            'final_rating' => $this->faker->numberBetween(1,100),
            'remarks' => $this->faker->numberBetween(1,100),
            'student_course_id' => $this->faker->numberBetween(1,3),
            'user_id' => $this->faker->numberBetween(1,31),
        ];
    }
}
