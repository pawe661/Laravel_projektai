<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ArticleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            // $table->string('title');
            // $table->text('excerpt');
            // $table->longText('description');
            // $table->text('author');
            // $table->unsignedBigInteger('image_id');

            'title' => $this->faker->words(3, true),
            'excerpt' => $this->faker->paragraph(1),
            'description' => $this->faker->paragraph(5),
            'author' => $this->faker->name(), 
            'image_id' => $this->faker->numberBetween(1,15),
            'category_id' =>$this->faker->numberBetween(1,15)
        ];
    }
}
