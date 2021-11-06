<?php

namespace Database\Factories;

use App\Models\Accommodation;
use App\Models\Booking;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class BookingFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Booking::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'persons' => $this->faker->numberBetween(1, 5),
            'start_date' => $this->faker->date(),
            'end_date' => $this->faker->date(),
            'accommodation_id' => function() {
                return Accommodation::all()->random();
            },
            'user_id' => function() {
                return User::all()->random();
            }
        ];
    }
}
