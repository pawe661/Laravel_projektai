<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class StudentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            // $table->string('name');
            // $table->string('surname');
            // $table->unsignedBigInteger('group_id');
            // $table->string('image_url');

            'name' => $this->faker->firstName(),
            'surname' => $this->faker->lastName(),
            'group_id' => $this->faker->numberBetween(1,15),
            'image_url' => $this->faker->imageUrl()
        ];
    }
}
