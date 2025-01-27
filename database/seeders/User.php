<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class User extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'name' => 'Admin User',
                'email' => 'admin@example.com',
                'password' => Hash::make('password'),
                'role' => 'admin',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Reseller User',
                'email' => 'reseller@example.com',
                'password' => Hash::make('password'),
                'role' => 'reseller',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Kurir User',
                'email' => 'kurir@example.com',
                'password' => Hash::make('password'),
                'role' => 'kurir',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Owner User',
                'email' => 'owner@example.com',
                'password' => Hash::make('password'),
                'role' => 'owner',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
