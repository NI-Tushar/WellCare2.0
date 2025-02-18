<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        User::create([
            'name' => 'User',
            'phone' => '01643381009',
            'email' => 'user@gmail.com',
            'password' => Hash::make('user9632')
        ]);

        $this->call([
            ConfigurationSeeder::class,
            AdminSeeder::class,
            ServiceSeeder::class,
            FamilyMamberSeeder::class,
        ]);

    }
}
