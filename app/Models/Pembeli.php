<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pembeli extends Model
{
    use HasFactory;

    protected $fillable = [
        'id', 'id_pembeli', 'nama'
    ];

    public function transaksis()
    {
        return $this->hasMany(Transaksi::class);
    }
}
