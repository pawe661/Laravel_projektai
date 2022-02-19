<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;



class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    
    
    public function definition()
    {
        $dbSeedCount = config('dbseedcount.db_seed_count_category');

        return [
            // $table->string('title');
            // $table->text('excerpt');
            // $table->longText('description');
            // $table->text('author');
            // $table->unsignedBigInteger('category_id');
            

            'title' => $this->faker->words(2, true),
            'excerpt' => $this->faker->words(7, true),
            'description' => $this->faker->paragraph(2),
            'author' => $this->faker->name(),
            'category_id' =>$this->faker->numberBetween(1,$dbSeedCount),
        ];
    }
}
