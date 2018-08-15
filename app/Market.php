<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Market extends Model
{

    protected $fillable = [
        'area_id', 
        'start_price',
        'end_price',
        
     ];

    public function area()
    {
        return $this->belongsTo(Area::class);
    }
}
