<?php

namespace Database\Factories;

use App\Models\Thing;
use Illuminate\Database\Eloquent\Factories\Factory;

class ThingFactory extends Factory
{
    // protected $model = Thing::class;

    public function definition()
    {
        return [
            'name' => $this->faker->word(),
            'description' => $this->faker->sentence(),
            'wrnt' => $this->faker->date(),
            'master' => \App\Models\User::factory(),
        ];
    }
}
