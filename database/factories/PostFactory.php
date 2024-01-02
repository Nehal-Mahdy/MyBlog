<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->title,  
            'content' => $this->faker->paragraph,         
            'description' => $this->faker->title,       
            'version' => $this->faker->randomNumber(2),  
            'img' => $this->faker->image,  
            'cat_id' => \App\Models\Cat::inRandomOrder()->first()->id,
            'user_id'=> \App\Models\User::inRandomOrder()->first()->id,
        ];


    }
}
