<?php

namespace App\Http\Controllers;
use App\Models\Produk;
use App\Models\Pembeli;
use App\Models\Transaksi;
use App\Models\RTransProd;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class PembeliController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('pages.pembeli.home');
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
    public function show()
    {
        $data = Produk::all();

        return view ('pages.pembeli.home', ['data' => $data]);
    }

    public function riwayat_pembelian()
    {
        // Get the authenticated user's ID
        $userId = Auth::id();
        $idPembeli = Pembeli::where('id_user', $userId)->first()->id_pembeli;
        // Fetch all transactions for the authenticated user
        $riwayatPembelian = Transaksi::where('id_pembeli', $idPembeli)->get();
    
        // Fetch associated products for each transaction along with their names
        foreach ($riwayatPembelian as $transaksi) {
            // Fetch associated products for the transaction
            $items = RTransProd::where('id_transaksi', $transaksi->id)->get();
    
            $total = 0;
            foreach ($items as $item) {
                $product = Produk::findOrFail($item->id_produk);
                $item->nama = $product->nama;
                $total += $item->jumlah * $item->harga; 
            }
    
            // Add the associated products to the transaction object
            $transaksi->items = $items;
            $transaksi->total = number_format($total);
        }
    
        // Pass the fetched transactions to the view
        return view('pages.pembeli.riwayat_pembelian', [
            'data' => $riwayatPembelian,
        ]);
    }

}
