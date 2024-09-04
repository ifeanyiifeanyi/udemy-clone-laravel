<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory(10)->create();

        User::factory()->create([
            'first_name' => 'Admin',
            'last_name' => 'User',
            'other_names' => 'Manager',
            'username' => 'Admin',
            'email' => 'admin@example.com',
            'role' => 'admin',
            'password' => bcrypt('password'),
            'email_verified_at' => now(),
            'address' => 'Admin Address',
            'phone' => '1234567890',
            'photo' => null, // Add photo upload logic here.
            'created_at' => now(),
            'updated_at' => now(),
            'remember_token' => null,

        ]);
    }
}
