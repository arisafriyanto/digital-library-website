<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        collect([
            [
                'name' => 'Aris Apriyanto',
                'username' => 'aris',
                'email' => 'arisafriyanto1933@gmail.com',
                'email_verified_at' => now(),
                'password' => bcrypt('password'),
                'remember_token' => Str::random(10),
                'access_level' => 'admin',
            ],
            [
                'name' => 'Afriyan Fast',
                'username' => 'afriyan',
                'email' => 'afriyanfast@gmail.com',
                'email_verified_at' => now(),
                'password' => bcrypt('password'),
                'remember_token' => Str::random(10),
                'access_level' => 'admin',
            ],
            [
                'name' => 'User',
                'username' => 'user',
                'email' => 'user@gmail.com',
                'email_verified_at' => now(),
                'password' => bcrypt('password'),
                'remember_token' => Str::random(10),
                'access_level' => 'user',
            ]
        ])->each(function ($user) {
            User::create($user);
        });

        // User::factory(10)->create();
    }
}
