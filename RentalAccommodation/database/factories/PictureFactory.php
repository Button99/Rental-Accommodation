<?php

namespace Database\Factories;

use App\Models\Accommodation;
use App\Models\Picture;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class PictureFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Picture::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'path' => $this->faker->imageUrl(),
            'ext' => $this->faker->fileExtension(),
            'description' => $this->faker->sentence(),
            'accommodation_id' => function() {
                return Accommodation::all()->random();
            },
            'user_id' => function() {
                return User::all()->random();
            }
        ];
    }
}
