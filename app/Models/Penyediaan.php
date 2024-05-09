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

    public function pemasoks()
    {
        return $this->belongsTo(Pemasok::class, 'id_pemasok', 'id_pemasok');
    }

    public function produks()
    {
        return $this->belongsToMany(Produk::class, 'r_peny_prods', 'id_penyediaan', 'id_produk')->withPivot('jumlah');
    }
}
