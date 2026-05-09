<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name'     => 'tester1',
            'email'    => 'tester1@tcg.com',
            'password' => Hash::make('password'),
        ]);
        User::create([
            'name'     => 'tester2',
            'email'    => 'tester2@tcg.com',
            'password' => Hash::make('password'),
        ]);
        User::create([
            'name'     => 'tester3',
            'email'    => 'tester3@tcg.com',
            'password' => Hash::make('password'),
        ]);
    }
}
