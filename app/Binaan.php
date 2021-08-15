<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Binaan extends Model
{
    protected $fillable = ['kode','kecamatan','kelurahan','tahun','nama','nik','tempat','tanggal','jenis_kelamin','alamat','pelayanan'];
}
