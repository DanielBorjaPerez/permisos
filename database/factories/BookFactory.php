<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class BookFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name'=> $this->faker->sentence,
            'slug'=> $this->faker->slug,
            'description'=> $this->faker->paragraph,
            'author'=> $this->faker->name,
            'price'=> $this->faker->numberBetween(10, 60)
        ];
    }
}
