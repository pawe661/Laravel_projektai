<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
 
            $this->call([
                DifficultySeeder::class,
                SchoolSeeder::class,
                AttendanceGroupSeeder::class,
                StudentSeeder::class,
            ]);
    }
}
