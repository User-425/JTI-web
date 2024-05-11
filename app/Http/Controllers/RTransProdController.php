<?php

namespace App\Http\Controllers;

use App\Models\RTransProd;
use App\Models\Transaksi;
use App\Models\Produk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RTransProdController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'jenis' => 'required|in:Tunai,Non-Tunai',
            'id_pegawai' => 'required|string|max:10',
            'id_pembeli' => 'required|string|max:10',
            'items' => 'required|array',
            'items.*.id' => 'required|string|max:10',
            'items.*.quantity' => 'required|integer|min:1',
        ]);
    
        // Begin transaction
        DB::beginTransaction();
    
        try {
            // Create transaction
            $transaksi = Transaksi::create([
                'jenis' => $validatedData['jenis'],
                'waktu' => now(),
                'id_pegawai' => $validatedData['id_pegawai'],
                'id_pembeli' => $validatedData['id_pembeli'],
            ]);
    
            // Get the ID of the created transaction
            $transaksiId = $transaksi->id;
    
            // Update stock for each product
            foreach ($validatedData['items'] as $item) {
                $product = Produk::where('id', $item['id'])->firstOrFail();
    
                // Check if the requested quantity is available
                if ($product->stok < $item['quantity']) {
                    throw new \Exception('Insufficient stock for product ' . $product->id);
                }
    
                $product->stok -= $item['quantity'];
                $product->save();
    
                // Create the association
                RTransProd::create([
                    'id_produk' => $item['id'],
                    'id_transaksi' => $transaksiId,
                    'jumlah' => $item['quantity'],
                    'harga' => $product->harga, // Use the product's price
                ]);
            }
    
            // Commit the transaction
            DB::commit();
    
            return response()->json(['message' => 'Transaction created successfully'], 201);
        } catch (\Exception $e) {
            // Rollback the transaction if an error occurs
            DB::rollback();
            return response()->json(['error' => $e->getMessage()], 400);
        }
    }
         

    /**
     * Display the specified resource.
     */
    public function show(RTransProd $rTransProd)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(RTransProd $rTransProd)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, RTransProd $rTransProd)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(RTransProd $rTransProd)
    {
        //
    }
}
