<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ReturPenjualan extends Model
{
    protected $fillable = ['po', 'tanggal', 'retur', 'customer', 'qty', 'satuan', 'keterangan', 'harga_jual', 'total', 'barang_id','status','mesin','planproduksi'];

    public function barang()
    {
        return $this->belongsTo(Barang::class);
    }

    public function prosesRetur()
    {
    	return $this->hasOne(ProsesRetur::class);
    }

    public function spkProduksi()
    {
    	return $this->hasOne(SpkProduksi::class);
    }
}
