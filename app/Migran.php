<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Migran extends Model
{
    protected $fillable = ['kode','kecamatan','kelurahan','tahun','nama','nik','tempat','tanggal','jenis_kelamin','pekerjaan','alamat','pelayanan'];
}
