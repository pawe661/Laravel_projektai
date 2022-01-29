<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ArticleCategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [

            
            'title' => $this->faker->words(2, true),
            'description' => $this->faker->paragraph(5)
        ];
    }
}
