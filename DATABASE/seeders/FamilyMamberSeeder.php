<?php

namespace Database\Seeders;

use App\Models\FamilyMamber;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FamilyMamberSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        FamilyMamber::create([
            'user_id' => 1,
            'relation' => 'Brother',
            'nid_name' => 'Biplob',
            'nid_number' => 12345678,
            'nid_image' => 'image',
            'address' => 'badda'
        ]);
    }
}
