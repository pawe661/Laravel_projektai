<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ClientFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    // $table->id();
    // $table->string('name');
    // $table->string('surname');
    // $table->string('username');
    // $table->bigInteger('company_id');
    // $table->string('image_url');
    // $table->string('phone');
    // $table->timestamps();
    public function definition()
    {
        return [
            'name' => $this->faker->firstName(),
            'surname' => $this->faker->lastName(),
            'username' => $this->faker->userName(),
            // 'company_id' => rand(1,10),
            'company_id' => $this->faker->numberBetween(1,10),
            'image_url' => $this->faker->imageUrl(),
            'phone' => rand(1,100000)


        ];
    }
}

