<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Formation;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $formations = Formation::all();
        $formationsNb = $formations->count();

        Category::factory()
            ->count(5)
            ->hasAttached($formations->random(random_int(1, $formationsNb)))
            ->create();
    }
}