<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{
    protected $fillable = ['name'];

    public function requests()
    {
        return $this->hasMany(Request::class);
    }
}
