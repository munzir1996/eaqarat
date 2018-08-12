<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rate extends Model
{
    protected $fillable = [
        'estate_id', 
        'user_id',
        'rate', 
     ];
    
    public function estate()
    {
        return $this->belongsTo(Estate::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
