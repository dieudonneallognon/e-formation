<?php

namespace Database\Seeders;

use App\Models\UserRole;
use Illuminate\Database\Seeder;

class FormationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Formation::factory()
            ->has(Chapter::count(random_int(3, 5)), 'chapters')
            ->hasAttached(Category::all(), 'categories')
            ->create();
    }
}