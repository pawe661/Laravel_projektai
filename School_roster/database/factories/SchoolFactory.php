<?php

namespace Database\Factories;

use Faker\Provider\lt_LT\PhoneNumber;
use Faker\Provider\lv_LV\PhoneNumber as Lv_LVPhoneNumber;
use Illuminate\Database\Eloquent\Factories\Factory;

class SchoolFactory extends Factory
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
            // $table->longText('description');
            // $table->string('place');
            // $table->unsignedBigInteger('phone');
            'name' => $this->faker->company(),
            'description' => $this->faker->paragraph(10),
            'place' => $this->faker->address(),
            'phone' => $this->faker->e164PhoneNumber()
        ];
    }
}
