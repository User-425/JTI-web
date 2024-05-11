<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penyediaan extends Model
{
    use HasFactory;

    protected $fillable = [
        'id', 'waktu', 'id_pemasok', 'id_pegawai',
    ];

    public function pemasok()
    {
        return $this->belongsTo(Pemasok::class, 'id_pemasok', 'id_pemasok');
    }

    public function pegawai()
    {
        return $this->belongsTo(Pegawai::class, 'id_pegawai', 'id_pegawai');
    }

    public function produks()
    {
        return $this->belongsToMany(Produk::class, 'r_peny_prods', 'id_penyediaan', 'id_produk')->withPivot('jumlah');
    }

    public function items()
    {
        return $this->hasMany(RPenyProd::class, 'id_penyediaan');
    }
}
