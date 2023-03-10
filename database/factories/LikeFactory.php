<?php

namespace Database\Factories;

use App\Models\Like;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use JetBrains\PhpStorm\ArrayShape;

class LikeFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Like::class;

    /**
     * Define the model's default state.
     */
    #[ArrayShape(['likeable_type' => "string", 'likeable_id' => "\Illuminate\Database\Eloquent\Factories\Factory", 'author_id' => "\Illuminate\Database\Eloquent\Factories\Factory"])]
    public function definition(): array
    {
        return [
            'likeable_type' => 'App\Models\Post',
            'likeable_id' => Post::factory(),
            'author_id' => User::factory()
        ];
    }
}
