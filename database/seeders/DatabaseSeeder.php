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
        $this->call([
            LaratrustSeeder::class,
            AdminSeeder::class,
            CurrencySeeder::class,
            CountryCitySeeder::class, // إضافة seeder الدول والمدن
            LevelSeeder::class, // إضافة seeder المستويات
            // GamesTableSeeder::class, // Adding the games seeder
        ]);
    }
}
