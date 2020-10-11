<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Course;
use App\Models\Schedule;
use App\Models\Subject;

class ScheduleFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Schedule::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'course_id' => Course::factory(),
            'subject_id' => Subject::factory(),
            'time_start' => $this->faker->dateTime(),
            'time_end' => $this->faker->dateTime(),
            'active' => $this->faker->boolean,
        ];
    }
}
