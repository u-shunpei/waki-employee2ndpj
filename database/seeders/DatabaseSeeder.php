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
        // \App\Models\User::factory(10)->create();
        $this->call([
            BirthdaysTableSeeder::class,
            BirthsTableSeeder::class,
            DepartmentsTableSeeder::class,
            DivisionsTableSeeder::class,
            PositionsTableSeeder::class,
        ]);
    }
}
