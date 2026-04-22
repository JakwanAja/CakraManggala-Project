<?php

// File: database/seeders/UserSeeder.php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::updateOrCreate(
            ['email' => 'admin@cakramanggala.com'],
            [
                'name' => 'Admin Cakra Manggala',
                'password' => Hash::make('admin123'),
                'role' => 'admin',
            ]
        );

        User::updateOrCreate(
            ['email' => 'moderator@cakramanggala.com'],
            [
                'name' => 'Moderator',
                'password' => Hash::make('moderator123'),
                'role' => 'moderator',
            ]
        );

        User::updateOrCreate(
            ['email' => 'admin2@gmail.com'],
            [
                'name' => 'Admin Dua',
                'password' => Hash::make('password123'),
                'role' => 'admin',
            ]
        );
    }
}
