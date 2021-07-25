<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ReturPenjualan extends Model
{
    protected $fillable = ['po', 'tanggal', 'retur', 'customer', 'qty', 'satuan', 'satuan', 'keterangan', 'harga_jual', 'total', 'barang_id','status'];

    public function barang()
    {
        return $this->belongsTo(Barang::class);
    }
}
