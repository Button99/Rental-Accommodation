<?php

namespace Database\Factories;

use App\Models\Accommodation;
use App\Models\Rate;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class RateFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Rate::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'total_rate_value' => '50',
            'rate' => '5',
            'counter' => '10',
            'user_id' => function() {
                return User::all()->random();
            },
            'accommodation_id' => function() {
                return Accommodation::all()->random();
            }
        ];
    }
}
