<?php

namespace Database\Factories;

use App\Models\Accommodation;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;

class AccommodationFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Accommodation::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'rooms' => $this->faker->randomNumber(3, true),
            'description' => $this->faker->paragraph(100, true),
            'town' => $this->faker->state(),
            'accommodation_type' => $this->faker->randomElement(['Apartment', 'House', 'Unique space', 'Boutique Hotel']),
            'latitude' => substr($this->faker->latitude(-90, 90), 0, 2),
            'longitude' => substr($this->faker->longitude(-180, 180), 0, 2),
            'address1' => $this->faker->address(),
            'address2' => $this->faker->address(),
            'price' => $this->faker->randomNumber(3),
            'user_id' => function() {
                return User::all()->random();
            },
        ];
    }
}
