<?php

namespace App\Http\Controllers;

use App\Models\Pegawai;
use App\Models\Produk; // Menggunakan Model Produk
use Illuminate\Http\Request;

class PegawaiController extends Controller
{
    /**
     *  Display a listing of the resource.
     */
    public function index()
    {
        return view('pages.pegawai.home');
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
    public function daftar_produk()
    {
        // Retrieve all products from the database
        $data = Produk::all();
    
        // Pass the products data to the view
        return view('pages.pegawai.produk.show', ['data' => $data]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pegawai $pegawai)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pegawai $pegawai)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pegawai $pegawai)
    {
        //
    }
}
