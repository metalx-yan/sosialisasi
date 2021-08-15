<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kekerasan extends Model
{
    protected $fillable = ['kode','kecamatan','kelurahan','tahun','nama','nik','tempat','tanggal','jenis_kelamin','pekerjaan','jenis_kekerasan','alamat','pelayanan'];
}
