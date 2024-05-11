<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RTransProd extends Model
{
    use HasFactory;

    protected $fillable = [
        'id', 'id_produk', 'id_transaksi', 'jumlah', 'harga'
    ];

    public function produk()
    {
        return $this->belongsTo(Produk::class, 'id_produk', 'id_produk');
    }

    public function transaksi()
    {
        return $this->belongsTo(Transaksi::class, 'id_transaksi', 'id_transaksi');
    }

    public function product()
    {
        return $this->belongsTo(Produk::class, 'id_produk');
    }
}
