<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bahan extends Model
{
    protected $fillable = ['bahan', 'qty','barang_id'];

    public function barang()
    {
        return $this->belongsTo(Barang::class);
    }
}
