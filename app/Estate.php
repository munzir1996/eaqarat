<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Estate extends Model
{

    const AVALIABLE = '1';
    const NOTAVALIABLE = '0';
    
    protected $fillable = [
        'area_id', 
        'rate_id',
        'user_id',
        'price',
        'status',//Avaliable not
        'image',
        'description',
        'type',// rent sale  
     ];
    
    public function area()
    {
        return $this->belongsTo(Area::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function rates()
    {
        return $this->hasMany(Rate::class);
    }

}
