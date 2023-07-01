<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Comment>
 */
class CommentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'comment' => fake()->sentence(10),
            'user_id' => fake()->randomElement([1,2,3,4]),
            'post_id' => fake()->randomElement([3,4,5,6,7,8,9,10,11])
        ];
    }
}
