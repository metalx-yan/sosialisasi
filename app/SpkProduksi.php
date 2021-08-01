<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SpkProduksi extends Model
{
    protected $fillable = ['po','retur','customer','satuan','mesin','retur_penjualan_id','jenis','berat','status'];

    public function barang()
    {
        return $this->belongsTo(Barang::class);
    }

    public function returPenjualan()
    {
    	return $this->belongsTo(ReturPenjualan::class);
    }
}
