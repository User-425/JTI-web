<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        // $this->call(DatabaseSeeder2::class);
        $this->call(DatabaseSeeder3::class);

        DB::table('users')->insert([
            'name' => 'Anfasa',
            'email' => 'pegawai@gmail.com',
            'role' => 'Pegawai',
            'email_verified_at' => now(),
            'password' => Hash::make('password'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Seed data for Pembeli (Buyer) role
        DB::table('users')->insert([
            'name' => 'Akhif',
            'email' => 'pembeli@gmail.com',
            'role' => 'Pembeli',
            'email_verified_at' => now(),
            'password' => Hash::make('password'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('pembelis')->insert([
            'id_pembeli' => '0001',
            'nama' => 'Aakhif',
            'id_user' => '2',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('pegawais')->insert([
            'nama' => 'Anfasa',
            'id_pegawai' => '0001',
            'no_telp' => '085706772202',
            'alamat' => 'Gresik',
            'id_user' => '1',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
