<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Course; // <-- Add this line

class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Course::create([
            'title' => 'Introduction to Laravel',
            'description' => 'A beginner-friendly course on Laravel.',
            'duration' => 10,
            'price' => 25.00,
            'image_url' => 'courses/default.png',
            'category_id' => 1,

        ]);
    }
}
