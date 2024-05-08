<?php

namespace App\Http\Controllers;

use App\Models\Transaksi;
use Illuminate\Http\Request;

class TransaksiController extends Controller
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

        // Create transaction
        $transaksi = Transaksi::create([
            'jenis' => $validatedData['jenis'],
            'waktu' => now(),
            'id_pegawai' => $validatedData['id_pegawai'],
            'id_pembeli' => $validatedData['id_pembeli'],
        ]);

        foreach ($validatedData['items'] as $item) {
            $transaksi->produks()->attach($item['id'], [
                'jumlah' => $item['quantity'],
                'harga' => 0, // Since the harga is calculated on the client-side, we set it to 0 here
            ]);
        }

        return response()->json(['message' => 'Transaction created successfully'], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Transaksi $transaksi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Transaksi $transaksi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Transaksi $transaksi)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Transaksi $transaksi)
    {
        //
    }
}
