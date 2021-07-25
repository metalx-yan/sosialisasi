<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProsesRetur extends Model
{
    protected $fillable = ['po', 'tanggal', 'retur', 'customer', 'qty', 'satuan', 'satuan', 'keterangan',  'barang_id','status'];

    public function barang()
    {
        return $this->belongsTo(Barang::class);
    }
}
