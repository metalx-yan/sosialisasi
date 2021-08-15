<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kecamatan extends Model
{
    protected $fillable = ['name'];

    public function kelurahans()
    {
        return $this->hasMany(Kelurahan::class);
    }
}
