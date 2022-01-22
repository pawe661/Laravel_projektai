<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Client;
use App\Models\Company;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // Galima rašyti arba tą patį kur Modelio Seeder arba kviesti iš juos
        // Client :: factory()->count(30)->create();
        $this->call([
            CompanySeeder::class,
            ClientSeeder::class
        ]);
    }
}
