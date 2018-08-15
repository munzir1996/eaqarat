<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rate extends Model
{

    const UNRATED = '0';
    protected $fillable = [
        'rate', 
     ];
    
    

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}
