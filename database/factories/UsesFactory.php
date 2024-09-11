<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Uses>
 */
class UsesFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'thing_id' => \App\Models\Thing::factory(),
            'place_id' => \App\Models\Place::factory(),
            'user_id' => \App\Models\User::factory(),
            'amount' => $this->faker->numberBetween(1, 100),
        ];
    }
}
