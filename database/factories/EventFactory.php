<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Event>
 */
class EventFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'key' => $this->faker->randomNumber(5,true),
            'name' => $this->faker->sentence(4),
            'date_start' => $this->faker->dateTimeBetween('-1 week', '+1 week'),
            'date_end' => $this->faker->dateTimeBetween('-1 week', '+1 week'),
            'status' => $this->faker->boolean()
        ];
    }
}
