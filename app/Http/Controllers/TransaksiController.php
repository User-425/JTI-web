<?php

namespace App\Http\Controllers;

use App\Models\Transaksi;
use App\Models\RTransProd;
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
        $data = Transaksi::with('pembeli', 'pegawai')->get();

        $id = auth()->id();

        $pegawai = RTransProd::where('id_user', $id)->all();
        $pegawaiId = $pegawai->id_pegawai;
        return view('pages.pegawai.transaksi.detail_pembelian', compact('data'));
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
