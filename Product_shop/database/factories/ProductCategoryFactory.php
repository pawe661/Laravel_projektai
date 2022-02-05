<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ProductCategoryFactory extends Factory
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

// Schema::create('product_categories', function (Blueprint $table) {
//     $table->id();
//     $table->string('title');
//     $table->longText('description');
//     $table->timestamps();


