<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder2 extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {


        // Seed data for Pembeli (Buyer) role
        DB::table('users')->insert([
            'name' => 'Raul',
            'email' => 'pembeli1@gmail.com',
            'role' => 'Pembeli',
            'email_verified_at' => now(),
            'password' => Hash::make('password1'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('users')->insert([
            'name' => 'Ahmad',
            'email' => 'pembeli2@gmail.com',
            'role' => 'Pembeli',
            'email_verified_at' => now(),
            'password' => Hash::make('password2'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('users')->insert([
            'name' => 'Rizqi',
            'email' => 'pembeli3@gmail.com',
            'role' => 'Pembeli',
            'email_verified_at' => now(),
            'password' => Hash::make('password3'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('users')->insert([
            'name' => 'Eman',
            'email' => 'pembeli4@gmail.com',
            'role' => 'Pembeli',
            'email_verified_at' => now(),
            'password' => Hash::make('password4'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('users')->insert([
            'name' => 'Ikhsan',
            'email' => 'pembeli5@gmail.com',
            'role' => 'Pembeli',
            'email_verified_at' => now(),
            'password' => Hash::make('password5'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

    }
}
