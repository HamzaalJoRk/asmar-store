<?php

namespace Database\Seeders;

use App\Models\Currency;
use Faker\Factory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
class CurrencySeeder extends Seeder
{
    public function run(): void
    {
        $faker = Factory::create();
        // Track::truncate();
        Currency::create([
            'currency' => 'lira',
            'code' => 'TRY',
            'rate' => '26.05',
            'symbol' => 'TL',
        ]);
        Currency::create([
            'currency' => 'dollar',
            'code' => 'USD',
            'rate' => '1',
            'symbol' => '$',
        ]);
    }
}
