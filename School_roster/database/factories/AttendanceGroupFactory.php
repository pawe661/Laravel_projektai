<?php

namespace Database\Factories;

use Faker\Provider\Lorem;
use Illuminate\Database\Eloquent\Factories\Factory;


class AttendanceGroupFactory extends Factory
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
            // $table->string('difficulty');
            // $table->unsignedBigInteger('school_id');


            'name' => $this->faker->company(),
            'description' => $this->faker->paragraph(5),
            'difficulty_id' =>$this->faker->numberBetween(1,5),  
            'school_id' => $this->faker->numberBetween(1,10)
        ];
    }
}
