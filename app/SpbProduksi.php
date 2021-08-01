<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SpbProduksi extends Model
{
    protected $fillable = ['po','tanggal','retur','customer','jenis','qty','satuan','berat','total_bahan','status','proses_retur_id'];

    public function barang()
    {
        return $this->belongsTo(Barang::class);
    }

    public function prosesRetur()
    {
    	return $this->belongsTo(ProsesRetur::class);
    }
}
