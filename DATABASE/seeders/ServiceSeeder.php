<?php

namespace Database\Seeders;

use App\Models\Service;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Service::create([
            'title' => "Child Care",
            'slug' => "Child-Care",
            'description' => 'We provide safe, nurturing environments for children of all ages. Each child receives personalized attention to foster their growth and development through play, education, and care.',
            'image' => 'Frontend/assets/img/services/child-care.png'
        ]);

        Service::create([
            'title' => "Patient Care",
            'slug' => "Patient-Care",
            'description' => 'Our compassionate caregivers support patients with daily activities, medication management, and recovery, ensuring their comfort and well-being throughout the process.',
            'image' => 'Frontend/assets/img/services/patient-care.png'
        ]);

        Service::create([
            'title' => "House Care",
            'slug' => "House Care",
            'description' => 'Our house care services help maintain clean and organized homes, including housekeeping, laundry, and meal preparation, ensuring your home remains comfortable and welcoming.',
            'image' => 'Frontend/assets/img/services/house-care.png'
        ]);

        Service::create([
            'title' => "Special Needs Care",
            'slug' => "Special-Needs-Care",
            'description' => 'We offer tailored care for individuals with special needs, addressing their physical, mental, and emotional challenges while promoting independence and well-being.',
            'image' => 'Frontend/assets/img/services/special-needs-care.png'
        ]);

        Service::create([
            'title' => "Autism Care",
            'slug' => "Autism-Care",
            'description' => 'Our autism care services create structured and supportive environments designed to meet the unique needs of individuals with autism, encouraging social skills, learning, and emotional development.',
            'image' => 'Frontend/assets/img/services/autism-care.png'
        ]);

        Service::create([
            'title' => "Senior Care",
            'slug' => "Senior-Care",
            'description' => 'Our compassionate senior care includes assistance with daily living, companionship, and health management, focusing on improving quality of life while ensuring safety, dignity, and independence.',
            'image' => 'Frontend/assets/img/services/senior-care.png'
        ]);
    }
}
