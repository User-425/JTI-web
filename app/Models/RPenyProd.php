<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RPenyProd extends Model
{
    use HasFactory;

    protected $fillable = [
        'id', 'id_produk', 'id_penyediaan', 'jumlah', 'harga',
    ];

    public function produk()
    {
        return $this->belongsTo(Produk::class, 'id_produk', 'id_produk');
    }

    public function penyediaan()
    {
        return $this->belongsTo(Penyediaan::class, 'id_penyediaan', 'id_penyediaan');
    }
    
}
