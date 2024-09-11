<?php 

namespace Database\Factories;

use App\Models\Place;
use Illuminate\Database\Eloquent\Factories\Factory;

class PlaceFactory extends Factory
{
    // protected $model = Place::class;

    public function definition()
    {
        return [
            'name' => $this->faker->word(),
            'description' => $this->faker->sentence(),
            'repair' => $this->faker->boolean(),
            'work' => $this->faker->boolean(),
        ];
    }
}
