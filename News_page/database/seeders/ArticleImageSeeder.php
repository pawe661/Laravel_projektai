<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\ArticleImage;

class ArticleImageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ArticleImage::factory()->count(15)->create();
    }
}
