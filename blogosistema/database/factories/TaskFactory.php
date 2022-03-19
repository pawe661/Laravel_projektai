<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class TaskFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $dbSeedCount = config('dbseedcount.db_seed_count_owner');
        
        return [
            // $table->string('title');
            // $table->string('description');
            // $table->date('start_date');
            // $table->date('end_date');
            // $table->string('logo');
            // $table->unsignedBigInteger('owner_id');
            // $table->foreign('owner_id')->references('id')->on('owners');

            'title' => $this->faker->words(2, true),
            'description' => $this->faker->words(10, true),
            'start_date' => $this ->faker->date,
            'end_date'   => $this ->faker->dateTimeBetween('now', '+30 years'),
            'logo' => $this->faker->imageUrl(),
            'owner_id' =>$this->faker->numberBetween(1,$dbSeedCount),
        ];
    }
}
