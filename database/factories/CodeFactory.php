<?php

namespace Database\Factories;

use App\Models\Event;
use App\Models\Status;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Code>
 */
class CodeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'barcode' => $this->faker->ean13(),
            'section' => $this->faker->randomElement(['41A Baja','41B Baja','42A Baja','42B Baja','43A Baja','43B Baja','44A Baja','44B Baja']),
            'row' => $this->faker->randomLetter(),
            'seat' => $this->faker->numberBetween(1,100),
            'gate' => $this->faker->randomElement(['P1','P2','P3','P4','P5','P6','E7','E8']),
            'order' => $this->faker->randomNumber(6,true),
            'price' => $this->faker->randomFloat(2,100,1000),
            'status_id' => Status::all()->random()->id,
            'event_id' => Event::all()->random()->id
        ];
    }
}
