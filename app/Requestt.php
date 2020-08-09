<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Requestt extends Model
{
    protected $table = 'requests';

    protected $fillable = ['description', 'total', 'purchase_id', 'status', 'date','item_id'];

    public function item()
    {
        return $this->belongsTo(Item::class);
    }

    public function purchase()
    {
        return $this->belongsTo(Purchase::class);
    }
}
