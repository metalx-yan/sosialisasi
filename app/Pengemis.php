<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pengemis extends Model
{
    protected $fillable = ['kode','kecamatan','kelurahan','tahun','nama','nik','tempat','tanggal','jenis_kelamin','alamat','pelayanan','keterangan'];
}
