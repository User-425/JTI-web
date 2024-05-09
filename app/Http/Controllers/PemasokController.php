<?php

namespace App\Http\Controllers;
use App\Models\Produk;
use App\Models\Pemasok;
use Illuminate\Http\Request;

class PemasokController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Pemasok::all();

        return view ('pages.pegawai.pemasok.show', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.pegawai.pemasok.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'id_pemasok' => 'required|string|max:10',
            'nama' => 'required|string|max:50',
            'no_telp' => 'required|string|max:12',
            'alamat' => 'required|string|max:30',
        ]);

        Pemasok::create($request->all());

        return redirect()->route('kelola_pemasok')->with('success', "Pemasok added successfully");
    }

    /**
     * Display the specified resource.
     */
    public function show(Pemasok $pemasok)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $data = Pemasok::findOrFail($id);
        return view('pages.pegawai.pemasok.edit', ['data' => $data]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'id_pemasok' => 'required|string|max:10',
            'nama' => 'required|string|max:50',
            'no_telp' => 'required|string|max:12',
            'alamat' => 'required|string|max:30',
        ]);

        $Pemasok = Pemasok::findOrFail($id);
        $Pemasok->id_pemasok = $request->input('id_pemasok');
        $Pemasok->nama = $request->input('nama');
        $Pemasok->no_telp = $request->input('no_telp');
        $Pemasok->alamat = $request->input('alamat');
        $Pemasok->save();

        return redirect()->route('kelola_pemasok')->with('succes', 'Pemasok update successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $Pemasok = Pemasok::find($id);
        $Pemasok->delete();

        return redirect('/kelola_pemasok'); 
    }
}
