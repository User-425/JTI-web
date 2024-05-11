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

        $this->call(UserSeeder::class);
        $this->call(ProdukSeeder::class);
        $this->call(TransactionSeeder::class);

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
            'id_pembeli' => '1001',
            'nama' => 'Aakhif',
            'id_user' => '7',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('pegawais')->insert([
            'nama' => 'Anfasa',
            'id_pegawai' => '2001',
            'no_telp' => '085706772202',
            'alamat' => 'Gresik',
            'id_user' => '6',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
