<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{
    protected $fillable = ['name', 'address'];

    public function requests()
    {
        return $this->hasMany(Request::class);
    }
}
