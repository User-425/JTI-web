<?php

namespace App\Http\Controllers;

use App\Models\Pembeli;
use App\Models\Pegawai;
use App\Models\Produk; // Menggunakan Model Produk
use App\Models\User; // Menggunakan Model User
use App\Models\RTransProd; // Menggunakan Model User
use App\Models\Transaksi;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

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

    public function pembelian()
    {
        // Retrieve all products from the database
        $data = Produk::all();
        $id = auth()->id();

        $pegawai = Pegawai::where('id_user', $id)->first();
        $pegawaiId = $pegawai->id_pegawai;

        return view('pages.pegawai.kasir.pembelian', ['data' => $data, 'pegawaiId'=> $pegawaiId]);
    }

    public function restock()
    {
        // Retrieve all products from the database
        $data = Produk::all();
        $id = auth()->id();

        $pegawai = Pegawai::where('id_user', $id)->first();
        $pegawaiId = $pegawai->id_pegawai;

        return view('pages.pegawai.kasir.restock', ['data' => $data, 'pegawaiId'=> $pegawaiId]);
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

    /**
     * Show the form for creating a new resource.
     */

     public function dashboard()
     {
         // Get the current month, year, and week
         $currentMonth = Carbon::now()->month;
         $currentYear = Carbon::now()->year;
         $currentWeek = Carbon::now()->weekOfYear;
     
         // Get transactions for the current month, year, and week
         $transaksiThisMonth = Transaksi::whereYear('waktu', $currentYear)
             ->whereMonth('waktu', $currentMonth)
             ->with('items.product')
             ->get();
     
         $transaksiThisWeek = Transaksi::whereYear('waktu', $currentYear)
             ->where('waktu', '>=', Carbon::now()->startOfWeek())
             ->with('items.product')
             ->get();
     
         // Calculate total selling for the current month
         $totalSellingThisMonth = $transaksiThisMonth->sum(function ($transaksi) {
             return $transaksi->items->sum(function ($item) {
                 return $item->jumlah * $item->product->harga;
             });
         });
     
         // Calculate total selling for the current week
         $totalSellingThisWeek = $transaksiThisWeek->sum(function ($transaksi) {
             return $transaksi->items->sum(function ($item) {
                 return $item->jumlah * $item->product->harga;
             });
         });
     
         // Get the 5 most recent transactions
         $recentTransactions = Transaksi::with('items.product')
         ->orderBy('waktu', 'desc')
         ->limit(5)
         ->get()
         ->map(function ($transaction) {
             $transaction->pegawaiName = Pegawai::where('id_pegawai', $transaction->id_pegawai)->firstOrFail()->nama;
             $transaction->pembeliName = Pembeli::where('id_pembeli', $transaction->id_pembeli)->firstOrFail()->nama;
 
             $transaction->items->map(function ($item) {
                 $product = Produk::findOrFail($item->id_produk);
                 $item->nama = $product->nama; // Assuming the name attribute in the Produk model is 'name'
                 return $item;
             });
 
             return $transaction;
         });
     
         $bestSellerThisMonth = DB::table('r_trans_prods')
             ->join('transaksis', 'r_trans_prods.id_transaksi', '=', 'transaksis.id')
             ->join('produks', 'r_trans_prods.id_produk', '=', 'produks.id')
             ->select('produks.nama', DB::raw('SUM(r_trans_prods.jumlah) as total_quantity'))
             ->whereYear('transaksis.created_at', $currentYear)
             ->whereMonth('transaksis.created_at', $currentMonth)
             ->groupBy('produks.nama')
             ->orderByDesc('total_quantity')
             ->first();
     
         $bestSellerName = $bestSellerThisMonth ? htmlspecialchars($bestSellerThisMonth->nama) : '';
     
         return view('pages.pegawai.home', [
             'totalSellingThisMonth' => number_format($totalSellingThisMonth),
             'totalSellingThisWeek' => number_format($totalSellingThisWeek),
             'bestSellerThisMonth' => $bestSellerName,
             'recentTransactions' => $recentTransactions,
         ]);
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
