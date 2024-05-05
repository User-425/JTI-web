<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;

    protected $fillable = [
        'id', 'id_transaksi', 'jenis', 'waktu', 'id_pegawai','id_pembeli','id_produk'
    ];

    public function pembelis()
    {
        return $this->belongsTo(Pembeli::class, 'id_pembeli', 'id_pembeli');
    }

    public function pegawais()
    {
        return $this->belongsTo(Pegewai::class, 'id_pegawai', 'id_pegawai');
    }

    public function produks()
    {
        return $this->belongsToMany(Produk::class, 'id_produk', 'id_produk');
    }
}
