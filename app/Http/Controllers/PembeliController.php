<?php

namespace App\Http\Controllers;

use App\Models\Pembeli;
use Illuminate\Http\Request;

class PembeliController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('pembeli.dashboard');
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
    public function show(Pembeli $pembeli)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pembeli $pembeli)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pembeli $pembeli)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pembeli $pembeli)
    {
        //
    }
}
