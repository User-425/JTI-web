<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use Illuminate\Http\Request;


class ProdukController extends Controller
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
        return view('pages.pegawai.produk.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'id_produk' => 'required|string|max:10',
            'nama' => 'required|string|max:50',
            'harga' => 'required|integer',
            'stok' => 'required|integer',
        ]);

        Produk::create($request->all());

        return redirect()->route('daftar_produk')->with('success', 'Produk added successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        // $data = Produk::findOrFail($id);
        // return view('pages.pegawai.produk.edit', ['data' => $data]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $data = Produk::findOrFail($id);
        return view('pages.pegawai.produk.edit', ['data' => $data]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'id_produk' => 'required|string|max:10',
            'nama' => 'required|string|max:50',
            'harga' => 'required|integer',
            'stok' => 'required|integer',
        ]);
    
        $produk = Produk::findOrFail($id);
        $produk->id_produk = $request->input('id_produk');
        $produk->nama = $request->input('nama');
        $produk->harga = $request->input('harga');
        $produk->stok = $request->input('stok');
        $produk->save();
    
        return redirect()->route('daftar_produk')->with('success', 'Produk updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $Produk = Produk::find($id);
        $Produk->delete();

        return redirect('/daftar_produk');
    }
}
