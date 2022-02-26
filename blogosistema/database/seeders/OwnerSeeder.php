<?php

namespace Database\Seeders;

use App\Models\Owner;
use Illuminate\Database\Seeder;

class OwnerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $dbSeedCount = config('dbseedcount.db_seed_count_owner');
        Owner::factory()->count($dbSeedCount)->create();
    }
}
