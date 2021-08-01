<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProsesRetur extends Model
{
    protected $fillable = ['po', 'tanggal', 'retur', 'customer', 'qty', 'satuan', 'satuan', 'keterangan',  'barang_id','status','retur_penjualan_id'];

    public function barang()
    {
        return $this->belongsTo(Barang::class);
    }

    public function returPenjualan()
    {
    	return $this->belongsTo(ReturPenjualan::class);
    }

    public function spbProduksi()
    {
    	return $this->hasOne(SpbProduksi::class);
    }
}
