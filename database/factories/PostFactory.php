<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends .
 */
class PostFactory extends Factory
{


    protected $model = Post::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title'=>$this->faker->title(2),
            'content'=>$this->faker->text(20),
            'is_published'=>1,
            'category_id'=>Category::get()->random()->id
        ];
    }
}
