<?php

namespace Database\Factories;

use App\Models\Code;
use App\Models\Service;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Record>
 */
class RecordFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'code_id' => Code::all()->random()->id,
            'user_id' => User::all()->random()->id,
            'service_id' => Service::all()->random()->id
        ];
    }
}