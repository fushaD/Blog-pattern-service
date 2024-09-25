<?php

namespace Database\Factories;

use App\Models\Comment;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Comment>
 */
class CommentFactory extends Factory
{
    protected $model = Comment::class;

    public function definition()
    {
        return [
            'post_id' => rand(1, 999999),
            'user_id' => rand(1, 999),
            'body' => $this->faker->paragraph,
            'is_approved' => $this->faker->boolean(80),
        ];
    }
}
