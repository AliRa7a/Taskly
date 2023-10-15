<?php

namespace Database\Factories;
use App\Models\Task;
use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factories\Factory;

class TaskFactory extends Factory
{
    protected $model = Task::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->sentence,
            'description' => $this->faker->paragraph,
            'due_date' => $this->faker->dateTimeBetween('+1 day', '+1 week'),
            'priority' => $this->faker->randomElement(['low', 'medium', 'high']),
            'user_id' => $this->faker->numberBetween(1, 6), // This will generate a random user ID from the `users` table.
        ];
    }
}
