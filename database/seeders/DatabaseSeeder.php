<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\Course;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
            if (User::where('username', 'administrator')->doesntExist()) {
                User::create([
                    'name' => 'Admin User',
                    'username' => 'administrator', // Set username
                    'email' => 'administrator@example.com', // Use any email
                    'password' => Hash::make('password'), // Hash the password
                    'role' => 'admin', // Assign role as 'admin'
                ]);
            }
}
}