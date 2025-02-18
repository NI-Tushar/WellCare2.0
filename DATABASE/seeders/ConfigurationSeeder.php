<?php

namespace Database\Seeders;

use App\Models\Configuration;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ConfigurationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Configuration::create([
            'logo' => 'logo.png',
            'video' => 'https://www.youtube.com/embed/Vb0dG-2huJE?autoplay=1&mute=1',
            'companydetail' => '12 Years+ Experienced, 300+ Interior Design Construction & 500+ Interior Consultancy Done by Circle Interior Ltd. Currently No#1 Best Interior Design Company in Bangladesh',
            'phone' => '01643371009',
            'email' => 'biplob@gmail.com',
            'address' => 'House # 6/20 (12st Floor) Block # E, A/k Link Rood, Boshundhora, Dhaka -1212',
            'facebook' => 'https://www.facebook.com/',
            'twitter' => 'https://www.twitter.com/',
            'youtube' => 'https://www.youtube.com/',
            'instagram' => 'https://www.instagram.com/',
        ]);
    }
}
