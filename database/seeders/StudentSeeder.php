<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Student;

class StudentSeeder extends Seeder
{
    public function run(): void
    {
        Student::create([
            'name' => 'John Doe',
            'email' => 'john.doe@example.com',
            'course_id' => 1, // Assumes a course with ID 1 exists
            'status' => 'Active',
        ]);
    }
}
