<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    protected $fillable = ['jenis'];

    public function bahans()
    {
        return $this->hasMany(Bahan::class);
    }

    public function returpenjualan()
    {
        return $this->hasMany(ReturPenjualan::class);
    }

    public function prosesretur()
    {
        return $this->hasMany(ProsesRetur::class);
    }

    public function spkproduksi()
    {
        return $this->hasMany(SpkProduksi::class);
    }

    public function spbproduksi()
    {
        return $this->hasMany(SpbProduksi::class);
    }
}
