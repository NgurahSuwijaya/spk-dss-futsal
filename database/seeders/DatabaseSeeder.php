<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'role' => '1',
            'name' => 'superadmin',
            'email' => 'superadmin@gmail.com',
            'password' => Hash::make('123123'),
            'email_verified_at' => now(),
        ]);
        User::create([
            'role' => '2',
            'name' => 'manager1',
            'email' => 'manager1@gmail.com',
            'password' => Hash::make('123123'),
            'email_verified_at' => now(),
        ]);
    }
}
