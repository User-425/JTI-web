<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Transaksi;
use App\Models\Produk;
use App\Models\RTransProd;

class TransactionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Define the number of transactions you want to create
        $numberOfTransactions = 100;
    
        // Define pegawai and pembeli details
        $pegawaiIds = ['2001', '2002', '2003'];
        $pembeliIds = ['1001', '1002', '1003', '1004'];
    
        // Get the start and end of the current month
        $startOfMonth = now()->startOfMonth();
        $endOfToday = now()->endOfDay();    
    
        // Loop to create multiple transactions
        for ($i = 0; $i < $numberOfTransactions; $i++) {
            // Randomly select pegawai and pembeli
            $pegawaiId = $pegawaiIds[array_rand($pegawaiIds)];
            $pembeliId = $pembeliIds[array_rand($pembeliIds)];
    
            // Generate random jenis
            $jenis = rand(1, 3) == 1 ? 'Non-Tunai' : 'Tunai';
    
            // Generate random time within the current month
            $waktu = $this->generateRandomDateTime($startOfMonth, $endOfToday);
    
            // Create the transaction
            $transaksi = Transaksi::create([
                'jenis' => $jenis,
                'waktu' => $waktu,
                'id_pegawai' => $pegawaiId,
                'id_pembeli' => $pembeliId,
            ]);
    
            // Get the ID of the created transaction
            $transaksiId = $transaksi->id;
    
            // Maintain array to store used product IDs for each transaction
            $usedProductIds = [];
    
            // Get a random number of items to associate with the transaction
            $numberOfItems = rand(1, 5);
    
            // Loop to create and associate products with the transaction
            for ($j = 0; $j < $numberOfItems; $j++) {
                // Generate unique random id_produk from 1 to 5
                do {
                    $productId = rand(1, 5);
                } while (in_array($productId, $usedProductIds));
    
                $usedProductIds[] = $productId;
    
                $product = Produk::where('id', $productId)->firstOrFail();
                $quantity = rand(1, 2);
                $price = $product->harga;
    
                // Create the association
                RTransProd::create([
                    'id_produk' => $productId,
                    'id_transaksi' => $transaksiId,
                    'jumlah' => $quantity,
                    'harga' => $price,
                ]);
            }
        }
    }
    

// Helper function to generate random datetime within a given range
private function generateRandomDateTime($start, $end)
{
    $startTimestamp = $start->timestamp;
    $currentTimestamp = now()->timestamp;
    $randomTimestamp = mt_rand($startTimestamp, min($currentTimestamp, $end->timestamp)); // Limit the upper bound to current time
    return \Carbon\Carbon::createFromTimestamp($randomTimestamp);
}

}
