<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Chapter;
use App\Models\Formation;
use App\Models\User;
use App\Models\UserRole;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // Formation::factory()
        //     ->hasAttached(Category::factory(2)->create())
        //     ->count(5)
        //     ->create();
        // Chapter::factory(5)->create();
        // Step::factory(5)->create();
        $this->call([
            UserRoleSeeder::class,
        ]);

        User::factory()
            ->count(5)
            ->has(
                Formation::factory()
                    ->count(random_int(1, 5))
                    ->has(
                        Chapter::factory()
                            ->count(random_int(1, 5))
                    )
            )
            ->create();
        $this->call([
            CategorySeeder::class,
        ]);

        User::create([
            'firstName'=> 'admin',
            'lastName'=> 'admin',
            'email'=> 'admin@admin.com',
            'password'=> Hash::make('admin'),
            'role_id' => UserRole::where('name', UserRole::ADMIN_ROLE)->first()->id,
        ]);
    }
}
