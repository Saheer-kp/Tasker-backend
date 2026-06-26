<?php

namespace Database\Seeders;

use App\Models\User\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::factory()->create([
            'name' => 'Shaheer',
            'email' => 'shaheer@example.com',
            'email_verified_at' => now(),
            'password' => Hash::make('password123'),
        ]);

        User::factory()->count(5)->create();
    }
}
