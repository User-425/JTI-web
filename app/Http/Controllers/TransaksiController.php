<?php

namespace App\Http\Controllers;

use App\Models\Transaksi;
use App\Models\RTransProd;
use App\Models\Produk;
use App\Models\Pegawai;
use App\Models\Pembeli;
use Illuminate\Http\Request;

class TransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Transaksi::with('pembeli', 'pegawai')->get();
        return view('pages.pegawai.transaksi.pembelian', compact('data'));
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
        $transaksi = Transaksi::findOrFail($id);
        $transaksi->pegawaiName = Pegawai::where('id_pegawai', $transaksi->id_pegawai)->firstOrFail()->nama;
        $transaksi->pembeliName = Pembeli::where('id_pembeli', $transaksi->id_pembeli)->firstOrFail()->nama;

        // Fetch associated products for the transaction with their names
        $items = RTransProd::where('id_transaksi', $id)->get();
        foreach ($items as $item) {
            $product = Produk::findOrFail($item->id_produk);
            $item->nama = $product->nama; // Assuming the name attribute in the Produk model is 'name'
        }
    
        // Pass the transaction and associated products to the view
        return view('pages.pegawai.transaksi.detail_pembelian', compact('transaksi', 'items'));
    }
    
    public function show_pembeli($id)
    {
        // Fetch the transaction details
        $transaksi = Transaksi::findOrFail($id);
        $transaksi->pegawaiName = Pegawai::where('id_pegawai', $transaksi->id_pegawai)->firstOrFail()->nama;
        $transaksi->pembeliName = Pembeli::where('id_pembeli', $transaksi->id_pembeli)->firstOrFail()->nama;

        // Fetch associated products for the transaction with their names
        $items = RTransProd::where('id_transaksi', $id)->get();
        foreach ($items as $item) {
            $product = Produk::findOrFail($item->id_produk);
            $item->nama = $product->nama; // Assuming the name attribute in the Produk model is 'name'
        }
    
        // Pass the transaction and associated products to the view
        return view('pages.pembeli.detail_pembelian', compact('transaksi', 'items'));
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
    public function destroy($id)
    {
        $transaksi = Transaksi::find($id);
        $transaksi->delete();

        return redirect('/transaksi/pembelian');
    }
}
