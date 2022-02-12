<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ArticleImageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [

            'alt' => $this->faker->words(3, true),
            // 'src' => $this ->faker->words(2, true),
            'src' => str_replace('public/', '',$this ->faker->image('public/images', 360, 360, 'animals', true)),
            'width' => $this->faker->numberBetween(100,300),
            'height' => $this->faker->numberBetween(100,300),
            'class' => $this->faker->words(1, true),
        ];
    }
}
