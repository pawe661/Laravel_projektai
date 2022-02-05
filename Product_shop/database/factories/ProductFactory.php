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
            //
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