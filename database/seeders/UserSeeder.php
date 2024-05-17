<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'id_user' => '1',
            'nama' => 'Ichsan Hanifdeal',
            'username' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('admin'),
            'role' => 'admin',
        ]);

        User::create([
            'id_user' => '2',
            'nama' => 'Andi Chandra Siburian',
            'username' => 'User',
            'email' => 'User@gmail.com',
            'password' => Hash::make('user'),
            'role' => 'user',
        ]);

        User::create([
            'id_user' => '3',
            'nama' => 'Ananda Ihza Yudistira',
            'username' => 'user0',
            'email' => 'User0@gmail.com',
            'password' => Hash::make('user'),
            'role' => 'user',
        ]);
    }
}
