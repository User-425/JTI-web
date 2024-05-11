<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use App\Models\Penyediaan;
use App\Models\RPenyProd;
use App\Models\Pegawai;
use App\Models\Pemasok;
use Illuminate\Http\Request;

class PenyediaanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Penyediaan::with('pemasok', 'pegawai')->get();
        return view('pages.pegawai.transaksi.penyediaan', compact('data'));
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        // Fetch the transaction details
        $penyediaan = Penyediaan::findOrFail($id);
        $penyediaan->pegawaiName = Pegawai::where('id_pegawai', $penyediaan->id_pegawai)->firstOrFail()->nama;
        $penyediaan->pemasokName = Pemasok::where('id_pemasok', $penyediaan->id_pemasok)->firstOrFail()->nama;

        // Fetch associated products for the transaction with their names
        $items = RPenyProd::where('id_penyediaan', $id)->get();
        foreach ($items as $item) {
            $product = Produk::findOrFail($item->id_produk);
            $item->nama = $product->nama;
        }
    
        // Pass the transaction and associated products to the view
        return view('pages.pegawai.transaksi.detail_penyediaan', compact('penyediaan', 'items'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Penyediaan $penyediaan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Penyediaan $penyediaan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Penyediaan $penyediaan)
    {
        //
    }
}
