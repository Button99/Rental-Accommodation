<?php

namespace Database\Factories;

use App\Models\Accommodation;
use App\Models\Comment;
use App\Models\Model;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;

class CommentFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Comment::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'comment' => $this->faker->realText(150),
            'user_id' => function() {
                return User::all()->random();
            },
            'accommodation_id' => function() {
                return Accommodation::all()->random();
            }
        ];
    }
}
