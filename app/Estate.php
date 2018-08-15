<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Estate extends Model
{

    const AVALIABLE = '1';
    const NOTAVALIABLE = '0';

    const RENT = 'rent';
    const SALE = 'sale';
    
    protected $fillable = [
        'area_id', 
        'user_id',
        'type_id',
        'price',
        'status',//Avaliable not
        'image',
        'description',
        'type',// rent sale  
     ];
    
     public function type()
    {
        return $this->belongsTo(Type::class);
    }
    
    public function area()
    {
        return $this->belongsTo(Area::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

}
