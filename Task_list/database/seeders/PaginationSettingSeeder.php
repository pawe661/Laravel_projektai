<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PaginationSettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('pagination_settings')->insert([
            'title' => '15',
            'value' => 15,
            'visible' => 1,
            'default_value' => 0
        ]);
        DB::table('pagination_settings')->insert([
            'title' => '20',
            'value' => 20,
            'visible' => 0,
            'default_value' => 1
        ]);
        DB::table('pagination_settings')->insert([
            'title' => '30',
            'value' => 30,
            'visible' => 1,
            'default_value' => 0
        ]);
        DB::table('pagination_settings')->insert([
            'title' => 'All',
            'value' => 1,
            'visible' => 1,
            'default_value' => 0
            
        ]);
    }
}
