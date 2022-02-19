<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class CategoryFactory extends Factory
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
            // $table->longText('description');
            // $table->text('category_editor');
            'title' => $this->faker->words(2, true),
            'description' => $this->faker->paragraph(2),
            'category_editor' => $this->faker->name(),
        ];
    }
}
