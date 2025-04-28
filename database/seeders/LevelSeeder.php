<?php

namespace Database\Seeders;

use App\Models\Level;
use Illuminate\Database\Seeder;

class LevelSeeder extends Seeder
{
    public function run(): void
    {
        $levels = [
            [
                'sort' => 1,
                'amount' => 1000,
                'image' => 'levels/bronze.png',
                'title_ar' => 'برونزي',
                'title_en' => 'Bronze'
            ],
            [
                'sort' => 2,
                'amount' => 5000,
                'image' => 'levels/silver.png',
                'title_ar' => 'فضي',
                'title_en' => 'Silver'
            ],
            [
                'sort' => 3,
                'amount' => 10000,
                'image' => 'levels/gold.png',
                'title_ar' => 'ذهبي',
                'title_en' => 'Gold'
            ],
            [
                'sort' => 4,
                'amount' => 25000,
                'image' => 'levels/platinum.png',
                'title_ar' => 'بلاتيني',
                'title_en' => 'Platinum'
            ],
            [
                'sort' => 5,
                'amount' => 50000,
                'image' => 'levels/diamond.png',
                'title_ar' => 'ماسي',
                'title_en' => 'Diamond'
            ],
        ];

        foreach ($levels as $level) {
            $newLevel = Level::create([
                'sort' => $level['sort'],
                'amount' => $level['amount'],
                'image' => $level['image']
            ]);

            $newLevel->translations()->create([
                'locale' => 'ar',
                'title' => $level['title_ar']
            ]);

            $newLevel->translations()->create([
                'locale' => 'en',
                'title' => $level['title_en']
            ]);
        }
    }
}