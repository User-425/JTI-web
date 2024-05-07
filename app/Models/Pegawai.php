<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pegawai extends Model
{
    use HasFactory;

    protected $fillable = [
        'id', 'id_pegawai', 'nama', 'no_telp', 'alamat', 'id_user',
    ];

    public function transaksis()
    {
        return $this->hasMany(Transaksi::class);
    }
}
