<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class OwnerFactory extends Factory
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
            // $table->string('email');
            // $table->string('phone');

            'name' => $this->faker->firstName(),
            'surname' => $this->faker->lastName(),
            'email' => $this->faker->email(),
            'phone' => rand(1,100000)
        ];
    }
}
