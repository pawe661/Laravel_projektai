<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Task;

class TaskSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $dbSeedCount = config('dbseedcount.db_seed_count_task');
        Task::factory()->count($dbSeedCount)->create();
    }
}
