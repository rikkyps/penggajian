<?php

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
        $this->call([
            DepartmentsTableSeeder::class,
            PositionsTableSeeder::class,
            KaryawansTableSeeder::class,
            StatusTableSeeder::class,
            SettingsTableSeeder::class,
            UsersTableSeeder::class,
            WorkcycleTableSeeder::class,
        ]);
    }
}
