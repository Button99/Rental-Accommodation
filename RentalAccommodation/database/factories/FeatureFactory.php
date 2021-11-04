<?php

namespace Database\Factories;

use App\Models\Feature;
use Illuminate\Database\Eloquent\Factories\Factory;

class FeatureFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Feature::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'pool' => $this->faker->boolean(50),
            'bbq' => $this->faker->boolean(50),
            'pool_table' => $this->faker->boolean(50),
            'wifi' => $this->faker->boolean(50),
            'tv' => $this->faker->boolean(50),
            'kitchen' => $this->faker->boolean(50),
            'parking' => $this->faker->boolean(50),
            'air_conditioning' => $this->faker->boolean(50),
            'washer' => $this->faker->boolean(50),
            'fire_extinguisher' => $this->faker->boolean(50),
            'smoke_alarm' => $this->faker->boolean(50)
        ];
    }
}
