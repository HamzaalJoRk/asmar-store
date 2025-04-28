<?php

namespace Database\Seeders;

use App\Models\Admin;
use App\Models\User;
use Faker\Factory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Factory::create();
        // User::truncate();
        $admin = Admin::create([
            'name' => 'admin',
            'email' => 'admin@asmar-card.com',
            'password' => bcrypt('123456'),
            'phone' => '0123456789',
            'image'=> 'no-image.jpg',
            'status'=> 'active',
            'remember_token' => Str::random(10),
            'email_verified_at' => now(),
        ]);
        $admin->addRole('admin');
    }
}
