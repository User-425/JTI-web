<?php

namespace App\Http\Controllers;

use App\Models\Pegawai;
use App\Models\Produk; // Menggunakan Model Produk
use App\Models\User; // Menggunakan Model User
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

    public function pengguna_index(){
        
        $data = User::all();

        return view('pages.pegawai.pengguna.show', ['data' => $data]);
    }

    public function pengguna_destroy($id){
        
        $pengguna = User::find($id);
        $pengguna->delete();
        
        return redirect('/kelola_pengguna');
    }

    public function pengguna_edit($id){
        
        $pengguna = User::find($id);
        return view('pages.pegawai.pengguna.edit', ['data' => $pengguna]);
    }

    public function pengguna_update(Request $request, $id){
        
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email',
            'role' => 'required|string',
        ]);

        $pengguna = User::find($id);
        $pengguna->name = $request->name;
        $pengguna->email = $request->email;
        $pengguna->role = $request->role;
        $pengguna->save();
        
        return redirect('/kelola_pengguna');
    }
}
