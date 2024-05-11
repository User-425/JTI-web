<?php

namespace App\Http\Controllers;
use App\Models\Penyediaan;
use App\Models\Produk;
use App\Models\RPenyProd;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RPenyProdController extends Controller
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
            'id_pegawai' => 'required|string|max:10',
            'id_pemasok' => 'required|string|max:10',
            'items' => 'required|array',
            'items.*.id' => 'required|string|max:10',
            'items.*.quantity' => 'required|integer|min:1',
            'items.*.price' => 'required|integer|min:1',
        ]);
    
        // Begin transaction
        DB::beginTransaction();
    
        try {
            // Create transaction
            $penyediaan = Penyediaan::create([
                'waktu' => now(),
                'id_pegawai' => $validatedData['id_pegawai'],
                'id_pemasok' => $validatedData['id_pemasok'],
            ]);
    
            // Get the ID of the created transaction
            $penyediaanId = $penyediaan->id;
    
            // Update stock for each product
            foreach ($validatedData['items'] as $item) {
                $product = Produk::where('id', $item['id'])->firstOrFail();
    
                $product->stok += $item['quantity']; // Add the quantity to the stock
                $product->save();
    
                // Create the association
                RPenyProd::create([
                    'id_produk' => $item['id'],
                    'id_penyediaan' => $penyediaanId,
                    'jumlah' => $item['quantity'],
                    'harga' => $item['price'],
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
    public function show(RPenyProd $rPenyProd)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(RPenyProd $rPenyProd)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, RPenyProd $rPenyProd)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(RPenyProd $rPenyProd)
    {
        //
    }
}
