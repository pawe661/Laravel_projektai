<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->words(3, true),
            'description' => $this->faker->paragraph(5),
            'price' => $this->faker->randomFloat(2, 1, 999999), 
            'category_id' =>$this->faker->numberBetween(1,3),
            'image_url' => $this->faker->imageUrl()
        ];
    }
}
// Schema::create('products', function (Blueprint $table) {
//     $table->id();
//     $table->string('title');
//     $table->longText('description');
//     $table->float('price', 8, 2);
//     $table->unsignedBigInteger('category_id');
//     $table->foreign('category_id')->references('id')->on('product_categories');

//     $table->string('image_url');
//     $table->timestamps();