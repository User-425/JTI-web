<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    use HasFactory;

    protected $fillable = [
        'id', 'id_produk', 'nama', 'harga', 'stok'
    ];

    public function transaksis()
    {
        return $this->belongsToMany(Transaksi::class, 'r_trans_prods', 'id_produk', 'id_transaksi')->withPivot('jumlah','harga');
    }

    public function penyediaans()
    {
        return $this->belongsToMany(Penyediaan::class, 'r_peny_prods', 'id_produk', 'id_penyediaan')->withPivot('jumlah');
    }
}
