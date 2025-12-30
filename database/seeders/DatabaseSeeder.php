<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Create a default user
        User::updateOrCreate(
            ['email' => 'adminTest169@example.com'],
            [
                'name' => 'Admin',
                'password' => bcrypt('veasna1234'),
                'role' => 'admin',
            ]
        );

        // Call your other seeders
        $this->call([
            CategorySeeder::class,
            CourseSeeder::class,
            StudentSeeder::class,
        ]);
    }
}
