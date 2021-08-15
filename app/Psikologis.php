<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Psikologis extends Model
{
    protected $fillable = ['kode','kecamatan','kelurahan','tahun','nama','nik','tempat','tanggal','jenis_kelamin','pendidikan','alamat','pelayanan'];
}
