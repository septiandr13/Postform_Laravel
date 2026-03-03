<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\User;
use App\Models\Category;

class PostFactory extends Factory
{
    public function definition(): array
    {
        $title = $this->faker->unique()->sentence(6);
        return [
            'title' => $title,
            'slug' => Str::slug($title) . '-' . Str::random(6),
            'content' => $this->faker->paragraphs(6, true),
            'user_id' => User::inRandomOrder()->value('id') ?? User::factory(),
            'category_id' => Category::inRandomOrder()->value('id') ?? Category::factory(),
        ];
    }
}
