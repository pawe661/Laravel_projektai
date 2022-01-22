<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DifficultySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('difficulties')->insert([
            'difficulty' => 'Beginner',
        ]);
        DB::table('difficulties')->insert([
            'difficulty' => 'Easy',
        ]);
        DB::table('difficulties')->insert([
            'difficulty' => 'Normal',
        ]);
        DB::table('difficulties')->insert([
            'difficulty' => 'Hard',
        ]);
        DB::table('difficulties')->insert([
            'difficulty' => 'Very Hard',
        ]);
    }
}
