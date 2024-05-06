<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder3 extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        DB::table('produks')->insert([
            'id_produk' => '101',
            'nama' => 'Kebab',
            'harga' => 5000,
            'stok' => 10,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('produks')->insert([
            'id_produk' => '102',
            'nama' => 'Thai tea',
            'harga' => 8000,
            'stok' => 6,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('produks')->insert([
            'id_produk' => '103',
            'nama' => 'Nasi Goreng',
            'harga' => 12000,
            'stok' => 5,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('produks')->insert([
            'id_produk' => '104',
            'nama' => 'Makaroni',
            'harga' => 2000,
            'stok' => 15,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('produks')->insert([
            'id_produk' => '105',
            'nama' => 'Ultramilk Coklat',
            'harga' => 6000,
            'stok' => 4,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
