<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Pegawai;
use App\Models\Pembeli;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Seed data for Pegawai (Employee) role
        $pegawaiUser1 = User::create([
            'name' => 'Raul',
            'email' => 'Pegawai1@gmail.com',
            'role' => 'Pegawai',
            'email_verified_at' => now(),
            'password' => Hash::make('password'),
        ]);

        Pegawai::create([
            'nama' => 'Raul',
            'id_pegawai' => '2002',
            'no_telp' => '085706727292',
            'alamat' => 'Cilacap',
            'id_user' => $pegawaiUser1->id,
        ]);

        $pegawaiUser2 = User::create([
            'name' => 'Annisa',
            'email' => 'Pegawai2@gmail.com',
            'role' => 'Pegawai',
            'email_verified_at' => now(),
            'password' => Hash::make('password'),
        ]);

        Pegawai::create([
            'nama' => 'Annisa',
            'id_pegawai' => '2003',
            'no_telp' => '085815721752',
            'alamat' => 'Jakarta',
            'id_user' => $pegawaiUser2->id,
        ]);

        // Seed data for Pembeli (Buyer) role
        $pembeliUser1 = User::create([
            'name' => 'Rizqi',
            'email' => 'Pembeli3@gmail.com',
            'role' => 'Pembeli',
            'email_verified_at' => now(),
            'password' => Hash::make('password'),
        ]);

        Pembeli::create([
            'id_pembeli' => '1002',
            'nama' => 'Rizqi',
            'id_user' => $pembeliUser1->id,
        ]);

        $pembeliUser2 = User::create([
            'name' => 'Daisy',
            'email' => 'pembeli4@gmail.com',
            'role' => 'Pembeli',
            'email_verified_at' => now(),
            'password' => Hash::make('password'),
        ]);

        Pembeli::create([
            'id_pembeli' => '1003',
            'nama' => 'Daisy',
            'id_user' => $pembeliUser2->id,
        ]);

        $pembeliUser3 = User::create([
            'name' => 'Ikhsan',
            'email' => 'Pembeli5@gmail.com',
            'role' => 'Pembeli',
            'email_verified_at' => now(),
            'password' => Hash::make('password5'),
        ]);

        Pembeli::create([
            'id_pembeli' => '1004',
            'nama' => 'Ikhsan',
            'id_user' => $pembeliUser3->id,
        ]);
    }
}
