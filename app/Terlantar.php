<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Terlantar extends Model
{
    protected $fillable = ['kode','kecamatan','kelurahan','tahun','nama','orangtua','nik','tempat','tanggal','jenis_kelamin','alamat','pelayanan','keterangan'];
}
