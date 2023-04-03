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
        $this->call(RolesTableSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(CategoriesTableSeeder::class);
    }
}

// seed it with php artisan db:seed
// if you want exclude any db php artisan db:seed --class=<Seeder Name>

