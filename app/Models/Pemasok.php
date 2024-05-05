<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pemasok extends Model
{
    use HasFactory;

    protected $fillable = [
        'id', 'id_pemasok', 'nama', 'no_telp', 'alamat'
    ];

    public function penyediaans()
    {
        return $this->hasMany(Penyediaan::class);
    }

}
